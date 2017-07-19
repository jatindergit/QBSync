<?php

/*
 * Set server like live|local
 * 
 * $server = 'local';
 * 
 * $server = 'live';
 */ 
 
 $server = 'local';
 
/*if (!defined('DS')) {
    define('DS', DIRECTORY_SEPARATOR);
}*/

define('OAUTH_CONSUMER_KEY', 'qyprdr5GbZKRg2WZYBCvz82T2hRoPu');
define('OAUTH_CONSUMER_SECRET', 'wUsiOEhYBJjU8MkRdqhQxQwuqlmHG2XyaTM76BcD');

define('OAUTH_REQUEST_URL', 'https://oauth.intuit.com/oauth/v1/get_request_token');
define('OAUTH_ACCESS_URL', 'https://oauth.intuit.com/oauth/v1/get_access_token');
define('OAUTH_AUTHORISE_URL', 'https://appcenter.intuit.com/Connect/Begin');


if($server == 'local'){
	define('DB_HOST','localhost');
	define('DB_USERNAME', 'root');
	define('DB_PASSWORD', 'ztech@44');
	define('DB_NAME', 'qbsync');
}


if($server == 'live'){
	define('DB_HOST','localhost');
	define('DB_USERNAME', 'cesmor1_qbsync');
	define('DB_PASSWORD', 'g{bUidlmbbTZ');
	define('DB_NAME', 'cesmor1_qbsync');
}

