<?php

/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>
<!DOCTYPE html>
<html>
    <head>
    <?= $this->Html->charset() ?>
        <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />
        <title><?= $this->fetch('title') ?> - QBSync</title>


        <!-- WEB FONTS -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800&amp;subset=latin,latin-ext,cyrillic,cyrillic-ext" rel="stylesheet" type="text/css" />

        <?= $this->Html->meta('icon') ?>

        <!-- CORE CSS -->
        <link href="<?= SITE_URL ?>/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

        <!-- TEMPLATE CSS -->
        <?= $this->Html->css(['essentials','layout']) ?>

        <!-- JAVASCRIPT FILES -->
        <script type="text/javascript">var plugin_path = '<?= SITE_URL ?>/plugins/';</script>
        <script type="text/javascript" src="<?= SITE_URL ?>/plugins/jquery/jquery-2.1.4.min.js"></script>
        <?= $this->Html->script('app') ?> 


    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    </head>
    <body>
        <!-- CONTAINER -->
        <div class="container">
            <!-- WRAPPER -->
            <div id="wrapper" class="clearfix">
                <aside id="aside">
                    <div class="userinfo">
                        <div class="avatar">
                            <img src="assets/images/avatar.png" class="img-responsive img-circle" alt="TLQ Prototype"> 
                        </div>
                        <div class="info">
                            <span class="username">QBSync - <span><?= QB_MODE?></span></span>
                            <span class="useremail"><?= $this->request->session()->read('Auth.User.email')?></span>
                        </div>
                    </div>
                    <nav id="sideNav"><!-- MAIN MENU -->
                        <ul class="nav nav-list">
                            <li class="active"><!-- dashboard -->
                                <a class="dashboard" href="">
                                    <i class="main-icon fa fa-dashboard"></i> <span>Dashboard</span>
                                </a>
                            </li>

                    <?php if($this->request->session()->read('realmId')){?>
                            <li>
                                <a class="dashboard" href="<?= $this->Url->build(['controller' => 'Customers', 'action' => 'index'])?>">
                                    <i class="main-icon fa fa-user"></i> <span>Customers</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?= $this->Url->build(['controller' => 'Items', 'action' => 'index'])?>">
                                    <i class="main-icon fa fa-sun-o"></i> <span>Items</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?= $this->Url->build(['controller' => 'Invoices', 'action' => 'index'])?>">
                                    <i class="main-icon fa fa-sun-o"></i> <span>Invoices</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?= $this->Url->build(['controller' => 'Payments', 'action' => 'index'])?>">
                                    <i class="main-icon fa fa-sun-o"></i> <span>Payments</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?= $this->Url->build(['controller' => 'Vendors', 'action' => 'index'])?>">
                                    <i class="main-icon fa fa-sun-o"></i> <span>Vendors</span>
                                </a>
                            </li>
                            <!--<li>
                        <?= $this->Html->link('Terms', ['controller' => 'Terms', 'action' => 'index'])?>
                            </li>
                            <li>
                        <?= $this->Html->link('TaxServices', ['controller' => 'TaxServices', 'action' => 'index'])?>
                            </li>
                            <li>
                        <?= $this->Html->link('Classes', ['controller' => 'Classes', 'action' => 'index'])?>
                            </li>-->
                            <li>
                                <a href="<?= $this->Url->build(['controller' => 'CreditMemos', 'action' => 'index'])?>">
                                    <i class="main-icon fa fa-sun-o"></i> <span>Credit Memos</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?= $this->Url->build(['controller' => 'Departments', 'action' => 'index'])?>">
                                    <i class="main-icon fa fa-sun-o"></i> <span>Departments</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?= $this->Url->build(['controller' => 'Purchases', 'action' => 'index'])?>">
                                    <i class="main-icon fa fa-sun-o"></i> <span>Purchases</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?= $this->Url->build(['controller' => 'PurchaseOrders', 'action' => 'index'])?>">
                                    <i class="main-icon fa fa-sun-o"></i> <span>Purchase Orders</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?= $this->Url->build(['controller' => 'Attachables', 'action' => 'index'])?>">
                                    <i class="main-icon fa fa-sun-o"></i> <span>Attachables</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?= $this->Url->build(['controller' => 'Accounts', 'action' => 'index'])?>">
                                    <i class="main-icon fa fa-sun-o"></i> <span>Accounts</span>
                                </a>
                            </li>
                    <?php }?>

                        </ul>
                    </nav>
                    <span id="asidebg"><!-- aside fixed background --></span>
                </aside>
                <!-- /ASIDE -->
                <!-- HEADER -->
                <header id="header">
                    <!-- Mobile Button -->
                    <button id="mobileMenuBtn"></button>
                    <!-- Logo -->
                    <span class="logo pull-left">
                    </span>
                    <form method="get" action="page-search.html" class="search pull-left hidden-xs">
                        <button type="button"><i class="fa fa-search"></i></button><input type="text" class="form-control" name="k" placeholder="Search for something..." />
                    </form>
                    <nav>
                        <!-- OPTIONS LIST -->
                        <ul class="nav pull-right">
                            <!-- USER OPTIONS -->
                            <li class="dropdown pull-left">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <img class="user-avatar img-circle" alt="" src="assets/images/avatar.png" height="34" /> 
                                    <span class="user-name">
                                        <span class="hidden-xs">
                                            Hello, <?= $this->request->session()->read('Auth.User.first_name')?> <i class="fa fa-angle-down"></i>
                                        </span>
                                    </span>
                                </a>
                                <ul class="dropdown-menu hold-on-click">
                                    <li><!-- my calendar -->
                                        <a href="calendar.html"><i class="fa fa-calendar"></i> Calendar</a>
                                    </li>
                                    <li><!-- my inbox -->
                                        <a href="#"><i class="fa fa-envelope"></i> Inbox
                                            <span class="pull-right label label-default">0</span>
                                        </a>
                                    </li>
                                    <li><!-- settings -->
                                        <a href="page-user-profile.html"><i class="fa fa-cogs"></i> Settings</a>
                                    </li>

                                    <li class="divider"></li>

                                    <li><!-- lockscreen -->
                                        <a href="page-lock.html"><i class="fa fa-lock"></i> Lock Screen</a>
                                    </li>
                                    <li><!-- logout -->
                                        <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'logout'])?>"><i class="fa fa-power-off"></i> Log Out</a>
                                    </li>
                                </ul>
                            </li>
                            <!-- /USER OPTIONS -->

                        </ul>
                        <!-- /OPTIONS LIST -->

                    </nav>

                </header>
                <!-- /HEADER -->


                <!-- 
                        MIDDLE 
                -->
                <section id="middle">
                    <div id="content" class="dashboard padding-20">
                            <?= $this->Flash->render() ?>
                            <?= $this->fetch('content') ?>
                    </div>
                    <footer><!-- footer -->
                        <p class="col-xs-12 footer-copyright">
                            <?= $this->Html->link('End User License Agreement', ['controller' => 'Pages', 'action' => 'endUserLicenseAgreement'])?>

                            <?= $this->Html->link('Terms of Services', ['controller' => 'Pages', 'action' => 'termsOfServices'])?>            

                            Powered by <b>TLQadmin</b> Theme.
                        </p>
                    </footer>
                </section>
                <!-- /MIDDLE -->

            </div>
        </div>

    </body>
</html>
