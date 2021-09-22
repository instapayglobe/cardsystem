<?php
$api = $database = $host = $user = $pass = "";
define('DB_SERVER', '127.0.0.1');
define('DB_SERVER_USERNAME',  'root');
define('DB_SERVER_PASSWORD', '');
define('DB_DATABASE', 'cardsystem');
if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
	$link = "https://";
else
	$link = "http://";
$web = $link . $_SERVER['HTTP_HOST'];
// Append the host(domain name, ip) to the URL.
$link .= $_SERVER['HTTP_HOST'] == 'localhost' ? $_SERVER['HTTP_HOST'] . '/card/' : $_SERVER['HTTP_HOST'];


/**
 * INCLUDES path
 */
if (!defined("WEBSITE")) {
	define("WEBSITE", $web);
}
if (!defined("INCLUDES_PATH")) {
	define("INCLUDES_PATH", "includes");
}
/**
 * INCLUDES path
 */
if (!defined("STUDENT_IMAGE")) {
	define("STUDENT_IMAGE", $link . "/client/students/");
}
if (!defined("USER_IMAGE")) {
	define("USER_IMAGE", $link . "admin/dist/img/user-01.png");
}

if (!defined("CLIENT_IMAGE")) {
	define("CLIENT_IMAGE", $link . "/home/f_images/");
}

/*
* Seprator information.
**/
if (!defined('FROMINDEX')) {
	define('FROMINDEX', true);
}

if (!defined('DS')) {
	define('DS', '/');
}
/**
 *  TEMPLATES path
 */
if (!defined("TEMPLATES_PATH")) {
	define("TEMPLATES_PATH", "template");
}
/**
 *  Layout path
 */
if (!defined("LAYOUT")) {
	define("LAYOUT", "template/layouts");
}
/*
*  SUB (ORDER TEMPLATES path
**/
if (!defined("LOGIC")) {
	define("LOGIC", INCLUDES_PATH . DS . "logic");
}
/**
 * LABEL path
 */
if (!defined("LABELS_PATH")) {
	define("LABELS_PATH", TEMPLATES_PATH . DS . "labels");
}
/**
 *   CLASS path
 */
if (!defined("INCLUDES_CLASS_PATH")) {
	define("INCLUDES_CLASS_PATH", "includes/class");
}

define("IMAGES_PATH", TEMPLATES_PATH . DS . "images");
/**
 *  CSS path
 */
if (!defined("CSS_PATH")) {
	define("CSS_PATH", "templates/css");
}

/**
 *  JAVASCRIPT path
 */
if (!defined("JS_PATH")) {
	define("JS_PATH", INCLUDES_PATH . DS . "js");
}

// Class Variables

global $configuration;

// when enabled, db_encoding transparently encodes and decodes data to and from the database without any
// programmatic effort on your part.
$configuration['db_encoding'] = 0;

$configuration['db']	= DB_DATABASE; //	database name
$configuration['host']	= DB_SERVER;		//	database host
$configuration['user']	= DB_SERVER_USERNAME;			//	database user
$configuration['pass']	= DB_SERVER_PASSWORD;				//	database password
$configuration['port'] 	= '3306';			//	database port
/*}*/

//proxy settings - if you are behnd a proxy, change the settings below
$configuration['proxy_host'] = false;
$configuration['proxy_port'] = false;
$configuration['proxy_username'] = false;
$configuration['proxy_password'] = false;

//plugin settings
$configuration['plugins_path'] = $_SERVER['DOCUMENT_ROOT'] . '/eschools/includes/plugins';  //absolute path to plugins folder, e.g c:/mycode/test/plugins or /home/phpobj/public_html/plugins

define('DIR_FS_BACKUP', 'includes/backups/');
define('PHP_DATE_TIME_FORMAT', 'd/M/Y H:i:s');
define('COMP_NAME', 'Schools');

$month_arr = array(1 => "April", 2 => "May", 3 => "June", 4 => "July", 5 => "August", 6 => "September", 7 => "October", 8 => "November", 9 => "December", 10 => "January", 11 => "February", 12 => "March");
$inventory_type_arr = array(1 => "Returnable Goods", 2 => "Non-returnable Goods");
