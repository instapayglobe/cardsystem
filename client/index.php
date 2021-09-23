<?php
ob_start();
session_start();
$errormessage = array();
//Report simple running errors
//error_reporting(E_ERROR | E_WARNING | E_PARSE);
// Report all errors except E_NOTICE
// This is the default value set in php.ini
// error_reporting(E_ALL ^ E_NOTICE);
// ini_set('display_errors', '1');
error_reporting(0);  
include('../admin/includes/logic/define-config.php');
include('../admin/includes/logic/functions.php');

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == "") {
	header("Location:login.php?msg=9");
	exit();
} else {
	$sql = 'SELECT balance FROM `wallet` WHERE wallet_id = "' . $_SESSION["usercode"] . '"';
	$wallet = getarrayassoc($sql);
}
/**
 * Declare variables
 */
$msg = 0;

/**
 * Meta keywords list
 */
fetch_global('pid', 'admin', 'action', 'msg');
$meta_keywords    = "";
$meta_description = "";
$permission_arr = explode(',', $_SESSION['permission']);
/// List of processes
$arr_pages = array(
	0 => array(
		'action' => 'default.inc',
		'view'   => 'default.theme',
		'labels' => 'default.lbl',
		'title'  => 'Default Page'
	),
	1 => array(
		'action' => 'student.inc',
		'view'   => 'student.theme',
		'labels' => 'student.lbl',
		'title'  => 'Student'
	),
	2 => array(
		'action' => 'fees.inc',
		'view'   => 'fees.theme',
		'labels' => 'fees.lbl',
		'title'  => 'Student Fees'
	),
	3 => array(
		'action' => 'wallet.inc',
		'view'   => 'wallet.theme',
		'labels' => 'wallet.lbl',
		'title'  => 'User Wallet'
	),
	4 => array(
		'action' => 'downloads.inc',
		'view'   => 'downloads.theme',
		'labels' => 'downloads.lbl',
		'title'  => 'Download '
	),
	5 => array(
		'action' => 'profile.inc',
		'view'   => 'profile.theme',
		'labels' => 'profile.lbl',
		'title'  => 'Profile'
	),
	6 => array(
		'action' => 'addstaff.inc',
		'view'   => 'addstaff.theme',
		'labels' => 'addstaff.lbl',
		'title'  => 'Add Staff page'
	),
	7 => array(
		'action' => 'inventory_master.inc',
		'view'   => 'inventory_master.theme',
		'labels' => 'inventory_master.lbl',
		'title'  => 'Add Inventory'
	),
	8 => array(
		'action' => 'newenquiry.inc',
		'view'   => 'newenquiry.theme',
		'labels' => 'newenquiry.lbl',
		'title'  => 'New Registration'
	),
	9 => array(
		'action' => 'requirement.inc',
		'view'   => 'requirement.theme',
		'labels' => 'requirement.lbl',
		'title'  => 'Add Requirement'
	),
	10 => array(
		'action' => 'logout.inc',
		'view'   => 'logout.theme',
		'labels' => 'logout.lbl',
		'title'  => 'Logout'
	),
	11 => array(
		'action' => 'transport.inc',
		'view'   => 'transport.theme',
		'labels' => 'transport.lbl',
		'title'  => 'Transport'
	),
	12 => array(
		'action' => 'viewassignment.inc',
		'view'   => 'viewassignment.theme',
		'labels' => 'viewassignment.lbl',
		'title'  => 'View assignment'
	),
	13 => array(
		'action' => 'classifieds.inc',
		'view'   => 'classifieds.theme',
		'labels' => 'classifieds.lbl',
		'title'  => 'Classifieds '
	),
	14 => array(
		'action' => 'themes.inc',
		'view'   => 'themes.theme',
		'labels' => 'themes.lbl',
		'title'  => 'Themes'
	),
	15 => array(
		'action' => 'interview.inc',
		'view'   => 'interview.theme',
		'labels' => 'interview.lbl',
		'title'  => 'Interview'
	),
	16 => array(
		'action' => 'fees.inc',
		'view'   => 'fees.theme',
		'labels' => 'fees.lbl',
		'title'  => 'Fee Structure'
	),
	17 => array(
		'action' => 'fei_master.inc',
		'view'   => 'fei_master.theme',
		'labels' => 'fei_master.lbl',
		'title'  => 'Fee Master'
	),
	18 => array(
		'action' => 'test.inc',
		'view'   => 'test.theme',
		'labels' => 'test.lbl',
		'title'  => 'Testing'
	),
	19 => array(
		'action' => 'hostel.inc',
		'view'   => 'hostel.theme',
		'labels' => 'hostel.lbl',
		'title'  => 'Hostel'
	),
	20 => array(
		'action' => 'manageclasses.inc',
		'view'   => 'manageclasses.theme',
		'labels' => 'manageclasses.lbl',
		'title'  => 'Manage Classes'
	)
);


// set default process
if (!isset($pid) || $pid >= count($arr_pages)) {
	$pid = 1;
}
// Including inc files ( PHP Coding files )
if (file_exists(INCLUDES_PATH . DS . $arr_pages[$pid]['action'] . ".php")) {
	include(INCLUDES_PATH . DS . $arr_pages[$pid]['action'] . ".php");
}

// Including Lables
if (file_exists(LABELS_PATH . DS . $arr_pages[$pid]['labels'] . ".php")) {
	include(LABELS_PATH . DS . $arr_pages[$pid]['labels'] . ".php");
}
// set defualt $layout here
switch ($pid) {

	case 0:
		$layout = "default";
		break;

	case 1:
		$layout = "adminlogin";
		break;

	case 2:
		if ($action == 'printenquirylist' || $action == 'print_enquiry') $layout = "print2";
		break;

	case 3:
		if ($action == 'printlist' || $action == 'printlist_enquiry' || $action == 'print_cast_list' || $action == 'print_age_wise') $layout = "print2";
		break;
	case 4:
		if ($action == 'print_assignment') $layout = "print2";
		break;
	default:
		$layout = "index";
}


/* for default layout */
if (!isset($layout) || $layout == "" || !file_exists("templates/layouts/" . $layout . ".theme.php")) {
	$layout = "index";
}
/* Call templates */
include(TEMPLATES_PATH . DS . 'layouts' . DS . $layout . ".theme.php");
