<?php

/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */

namespace App\Controller;

//session_start();
$path = dirname(dirname(dirname(__FILE__))) . '/vendor/intuit/v3-php-sdk/autoload.php';
require_once($path);

use App\Controller\AppController;
use OAuth;
use QuickBooksOnline\API\DataService\DataService;

/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link http://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class UsersController extends AppController {

    public function initialize() {
        parent::initialize();
        //$this->loadComponent('Schema');
        $this->Auth->allow(['register', 'logout', 'authenticate', 'home', 'index']);
    }

    public function authenticate() {
        $this->viewBuilder()->setLayout('default');
    }

    public function home() {



        // The url to this page. it needs to be dynamic to handle runnable's dynamic urls
        define('CALLBACK_URL', 'https://' . $_SERVER['HTTP_HOST'] . '/QBSync/users/home');
        // cleans out the token variable if comming from
        // connect to QuickBooks button
        if (isset($_GET['start'])) {
            $this->request->session()->delete('token');
        }

        try {

            $oauth = new OAuth(OAUTH_CONSUMER_KEY, OAUTH_CONSUMER_SECRET, OAUTH_SIG_METHOD_HMACSHA1, OAUTH_AUTH_TYPE_URI);
            //var_dump($oauth);
            $oauth->enableDebug();
            $oauth->disableSSLChecks(); //To avoid the error: (Peer certificate cannot be authenticated with given CA certificates)
            if (!isset($_GET['oauth_token']) && !$this->request->session()->read('token')) {
                // step 1: get request token from Intuit

                $request_token = $oauth->getRequestToken(OAUTH_REQUEST_URL, CALLBACK_URL);
                //var_dump($request_token);
                //echo OAUTH_AUTHORISE_URL .'?oauth_token='.$request_token['oauth_token'];die;
                //$_SESSION['secret'] = $request_token['oauth_token_secret'];
                $this->request->session()->write('secret', $request_token['oauth_token_secret']);
                // step 2: send user to intuit to authorize 
                // echo OAUTH_AUTHORISE_URL . '?oauth_token=' . $request_token['oauth_token'];die;
                header("Location: " . OAUTH_AUTHORISE_URL . '?oauth_token=' . $request_token['oauth_token']);
                //return $this->redirect('https://www.google.co.in');
                //return $this->redirect(OAUTH_AUTHORISE_URL . '?oauth_token=' . $request_token['oauth_token']);
                exit;
            }

            if (isset($_GET['oauth_token']) && isset($_GET['oauth_verifier'])) {
                // step 3: request a access token from Intuit
                $oauth->setToken($_GET['oauth_token'], $this->request->session()->read('secret'));
                $access_token = $oauth->getAccessToken(OAUTH_ACCESS_URL);

                $this->request->session()->write('token', serialize($access_token));
                $this->request->session()->write('realmId', $_REQUEST['realmId']);  // realmId is legacy for customerId
                $this->request->session()->write('dataSource', $_REQUEST['dataSource']);

                $token = $this->request->session()->read('token');
                $realmId = $this->request->session()->read('realmId');
                $dataSource = $this->request->session()->read('dataSource');
                $secret = $this->request->session()->read('secret');
                // write JS to pup up to refresh parent and close popup
                echo '<script type="text/javascript">
						window.opener.location.href = window.opener.location.href;
						window.close();
					  </script>';
            }
        } catch (OAuthException $e) {
            echo "Got auth exception";
            echo '<pre>';
            print_r($e);
        }
    }

    public function customers() {


        $dataService = DataService::Configure(array(
                    'auth_mode' => 'oauth1',
                    'consumerKey' => "qyprdr5GbZKRg2WZYBCvz82T2hRoPu",
                    'consumerSecret' => "wUsiOEhYBJjU8MkRdqhQxQwuqlmHG2XyaTM76BcD",
                    'accessTokenKey' => "lvprdHdHbwQPbqjGetsIPzus95DK9YDrveqJRPAxugn0123j",
                    'accessTokenSecret' => "KGW5HXYzsTXp1eLt11MdJXBmx4gwbai3WqJayqIi",
                    'QBORealmID' => "123145837357759",
                    'baseUrl' => "https://sandbox-quickbooks.api.intuit.com"
        ));

        //get accesstokenkey from this url
        //https://appcenter.intuit.com/Playground/OAuth/IA/


        $serviceContext = $dataService->getServiceContext();

        $CompanyInfo = $dataService->getCompanyInfo();
        echo "<pre>";
        echo "<br>===========================Your Company======================================<br>";
        echo 'Company Name:<b>' . $CompanyInfo->CompanyName . '</b><br>';
        echo 'Legal Name:<b>' . $CompanyInfo->LegalName . '</b><br>';
        $allCustomers = $dataService->Query("SELECT * FROM Customer");
        echo "<br>===========================Customers======================================<br>";
        pr($allCustomers);

        $error = $dataService->getLastError();
        if ($error != null) {
            echo "The Status code is: " . $error->getHttpStatusCode() . "\n";
            echo "The Helper message is: " . $error->getOAuthHelperError() . "\n";
            echo "The Response message is: " . $error->getResponseBody() . "\n";
            echo "The Intuit Helper message is: IntuitErrorType:{" . $error->getIntuitErrorType() . "} IntuitErrorCode:{" . $error->getIntuitErrorCode() . "} IntuitErrorMessage:{" . $error->getIntuitErrorMessage() . "} IntuitErrorDetail:{" . $error->getIntuitErrorDetail() . "}";
        }
    }

    public function logout() {
        //return $this->redirect(['action' => 'index']);
        $this->request->session()->destroy();
        $this->request->session()->delete('secret');
        $this->request->session()->delete('token');
        $this->request->session()->delete('realmId');
        $this->request->session()->delete('dataSource');
        $this->Auth->logout();
        return $this->redirect(['action' => 'index']);
        //return $this->redirect($this->Auth->logout());
    }

    public function register() {

        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {

            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The configuration has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            pr($user->errors());
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    public function login() {
        $this->viewBuilder()->setLayout('blank');
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            //pr($user);die;
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect(['action' => 'authenticate']);
                //return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Invalid username or password, try again'));
        }
    }

    public function index() {
        
    }

}
