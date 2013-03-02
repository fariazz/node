<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');

//define('USER_NODE_COUNT', 9); 
define('USER_NODE_MAX_COUNT', 800000); 

define('RECAPTCHA_URL', "http://www.google.com/recaptcha/api/verify"); 
define('RECAPTCHA_PRIVATKEY', "6LcD5tISAAAAABxGlvTIpIg0JwHT9UtGqLc7odFM"); 
define('RECAPTCHA_PUBLICKEY', "6LcD5tISAAAAAC-o03EN-SKrlYtYECFQLQJjqAl4"); 

define('GOOGLE_QR_API', 'http://chart.apis.google.com/chart'); 

define('QRIMG_PATH', getcwd().DIRECTORY_SEPARATOR."www".DIRECTORY_SEPARATOR."qr"); 

// do not change this value ever 
define('IMG_COUNT_IN_DIR', 10000); 

define('SEARCH_RESULT_PER_PAGE', 4); 

define('EMAIL_REGEXP_PATTERN', '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/'); 

define('ERROR_TXTFILE', getcwd().DIRECTORY_SEPARATOR."www".DIRECTORY_SEPARATOR."site_logs".DIRECTORY_SEPARATOR."error_txtfile"); 

define('PROFILE_IMAGE', getcwd().DIRECTORY_SEPARATOR."www".DIRECTORY_SEPARATOR."img".DIRECTORY_SEPARATOR."profile"); 

define('CLUB_IMAGE', getcwd().DIRECTORY_SEPARATOR."www".DIRECTORY_SEPARATOR."img".DIRECTORY_SEPARATOR."club"); 

define('SECOND_TILL_START_CAN_CANCEL_GAME', 60 * 60 * 48); 
define('SECOND_TILL_START_CAN_CANCEL_TRAINING', 60 * 60 * 48); 

define('FOR_EVERY_VITORY_RANK', 10); 
define('FOR_EVERY_LOSS_RANK', -5); 
define('FOR_EVERY_SETWON_RANK', 5); 
define('FOR_EVERY_GAMEWON_RANK', 1); 

define('FACEBOOK_APP_ID', '108885905824217'); 
define('FACEBOOK_APP_SECRET', 'fde39408c44bac1bbeb5a039d3df6f20'); 
define('FACEBOOK_SITE_URL', 'http://tennis.qrland.net/auth'); 

/* End of file constants.php */
/* Location: ./application/config/constants.php */