<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');
/*
 * Set server like live|local
 * 
 * $server = 'local';
 * 
 * $server = 'live';
 */

$server = 'live';

$mode = 'sandbox';

$mode = 'production';


/* if (!defined('DS')) {
  define('DS', DIRECTORY_SEPARATOR);
  } */

if ($mode == 'sandbox') {
    define('OAUTH_CONSUMER_KEY', 'qyprdr5GbZKRg2WZYBCvz82T2hRoPu');
    define('OAUTH_CONSUMER_SECRET', 'wUsiOEhYBJjU8MkRdqhQxQwuqlmHG2XyaTM76BcD');
    define('QB_BASE_URL', "https://sandbox-quickbooks.api.intuit.com");
    define('QB_MODE', 'Sandbox');
}

if ($mode == 'production') {
    define('OAUTH_CONSUMER_KEY', 'qyprdbJNsEl7bZeBytnSZEevMbbYEF');
    define('OAUTH_CONSUMER_SECRET', '6OneTCCtgtKyOhqC5L2nWKLrDDo1EPytRvdczcwq');
    define('QB_BASE_URL', "https://quickbooks.api.intuit.com");
    define('QB_MODE', 'Production');
}



define('OAUTH_REQUEST_URL', 'https://oauth.intuit.com/oauth/v1/get_request_token');
define('OAUTH_ACCESS_URL', 'https://oauth.intuit.com/oauth/v1/get_access_token');
define('OAUTH_AUTHORISE_URL', 'https://appcenter.intuit.com/Connect/Begin');


if ($server == 'local') {
    define('DB_HOST', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', 'ztech@44');
    define('DB_NAME', 'qbsync');
    define('SITE_URL', 'http://localhost/QBSync');
}





if ($server == 'live') {
    define('DB_HOST', 'localhost');
    define('DB_USERNAME', 'cesmor1_qbsync');
    define('DB_PASSWORD', 'g{bUidlmbbTZ');
    define('DB_NAME', 'cesmor1_qbsync');
    define('SITE_URL', 'https://fmpconnect.com/QBSync');
}

