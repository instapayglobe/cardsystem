<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$GLOBALS['db'] = mysqli_connect(DB_SERVER, DB_SERVER_USERNAME, DB_SERVER_PASSWORD, DB_DATABASE);

function getMultipleRecords($sql, $types = null, $params = [])
{
	$GLOBALS['db'];
	$stmt = $GLOBALS['db']->prepare($sql);
	if (!empty($params) && !empty($params)) { // parameters must exist before you call bind_param() method
		$stmt->bind_param($types, ...$params);
	}
	$stmt->execute();
	$result = $stmt->get_result();
	$user = $result->fetch_all(MYSQLI_ASSOC);
	$stmt->close();
	return $user;
}
function getSingleRecord($sql, $types, $params)
{
	$GLOBALS['db'];
	$stmt = $GLOBALS['db']->prepare($sql);
	$stmt->bind_param($types, ...$params);
	$stmt->execute();
	$result = $stmt->get_result();
	$user = $result->fetch_assoc();
	$stmt->close();
	return $user;
}
function modifyRecord($sql, $types, $params)
{
	$GLOBALS['db'];
	$stmt = $GLOBALS['db']->prepare($sql);
	$stmt->bind_param($types, ...$params);
	$result = $stmt->execute();
	$stmt->close();
	return $result;
}
function browser_info($agent = null)
{
	$known = array(
		'msie', 'firefox', 'safari', 'webkit', 'opera', 'netscape',
		'konqueror', 'gecko'
	);
	$agent = strtolower($agent ? $agent : $_SERVER['HTTP_USER_AGENT']);
	$pattern = '#(?<browser>' . join('|', $known) .
		')[/ ]+(?<version>[0-9]+(?:\.[0-9]+)?)#';
	if (!preg_match_all($pattern, $agent, $matches)) return array();
	$i = count($matches['browser']) - 1;
	$b_info[0] = $matches['browser'][$i];
	$b_info[1] = $matches['version'][$i];
	return $b_info;
}

//check the administratorlogin
function checkadminlogin()
{
	if (!isset($_SESSION['common']['admin_user']) || $_SESSION['common']['admin_user'] == "") {
		header('location:?action=invalidlogin');
		exit;
	}
}
function runQuery($sql)
{
	return mysqli_query($GLOBALS['db'], $sql);
}
function runmQuery($sql)
{

	return mysqli_multi_query($GLOBALS['db'], $sql);
}
function AffectedQuery($sql)
{
	mysqli_query($GLOBALS['db'], $sql);
	return mysqli_affected_rows($GLOBALS['db']);
}
function sqlnumber($sql)
{
	$rs_qury   = @mysqli_query($GLOBALS['db'], $sql);
	return @mysqli_num_rows($rs_qury);
}

function getarrayassoc($sql_qury)
{

	$rs_qury   = @mysqli_query($GLOBALS['db'], $sql_qury);

	if (@mysqli_num_rows($rs_qury) > 0) {

		return @mysqli_fetch_assoc($rs_qury);
	}
	//echo $sql_qury;
	return null;
}

function thumbimage($imgsrc, $thumbsize = "100", $alt = "Image", $title = "Image")
{
	if (file_exists($imgsrc)) {
		list($width, $height) = getimagesize($imgsrc);

		$imgratio = $width / $height;
		if ($imgratio > 1) {
			$newwidth  = $thumbsize;
			$newheight = $thumbsize / $imgratio;
		} else {
			$newheight = $thumbsize;
			$newwidth  = $thumbsize * $imgratio;
		}
		return '<img src="' . $imgsrc . '" width="' . $newwidth . '" height="' . $newheight . '"  alt="' . $alt . '" border="0" title="' . $title . '" >';
	} else {
		echo "No Image";
	}
}
function get_studentleave($at_staff_date)
{
	$classi_data = array();

	$new_date = substr_replace($at_staff_date, "", -9);


	$dateFormated = explode('/', $new_date);

	$date = $dateFormated[2] . '-' . $dateFormated[1] . '-' . $dateFormated[0];
	//$hert =$dateFormated[2].'-'.$dateFormated[1];

	$qurydate = "SELECT count(`at_staff_leave`) FROM i_attend_staff where at_staff_leave='1' AND DATE_FORMAT(`at_staff_date`, '%y-%m')=DATE_FORMAT('$date', '%y-%m')";

	$rs_leaves = mysqli_query($GLOBALS['db'], $qurydate);

	return mysqli_num_rows($rs_leaves);
}

function getamultiassoc($sql_qury)
{
	$arraydata = array();
	$rs_qury   = @mysqli_query($GLOBALS['db'], $sql_qury);
	if (@mysqli_num_rows($rs_qury) > 0) {
		while ($data = @mysqli_fetch_assoc($rs_qury)) {
			$arraydata[] = $data;
		}
		return $arraydata;
	}
	//echo $sql_qury;
	return null;
}
function changejsdate($jsdate)
{
	list($dd, $mm, $yyyy) = explode('[/.-]', $jsdate);
	return "$dd-$mm-$yyyy";
}

function changejsdate1($jsdate)
{
	list($dd, $mm, $yyyy) = explode('[/.-]', $jsdate);
	return "$yyyy-$mm-$dd";
}
function classname($cid)
{
	$class = "SELECT `i_classname` FROM `i_classes` WHERE `i_classesid`=" . $cid;
	$className = getarrayassoc($class);
	return $className['i_classname'];
}

function bookname($bid)
{
	$book = "SELECT `lbook_title` FROM `i_libbook` WHERE `i_libbookid`=" . $bid;
	$bookName = getarrayassoc($book);
	return $bookName['lbook_title'];
}

function hostelitemname($bid)
{
	$item = "SELECT `in_item_name` FROM `i_in_item_master` WHERE `i_in_item_masterid`=" . $bid;
	$itemName = getarrayassoc($item);
	return $itemName['in_item_name'];
}

function subjectname($sjid)
{
	$sub = "SELECT `i_subjectname` FROM `i_subject` WHERE `i_subjectid`='" . $sjid . "'";
	$subName = getarrayassoc($sub);
	return $subName['i_subjectname'];
}

function deptname($sid)
{
	$dept = "SELECT `i_deptname` FROM `i_departments` WHERE `i_departmentsid`='" . $sid . "'";
	$deptName = getarrayassoc($dept);
	return $deptName['i_deptname'];
}

function postname($sid1)
{

	$post = "SELECT `i_postname` FROM `i_deptposts` WHERE `i_deptpostsid`='" . $sid1 . "'";
	$postName = getarrayassoc($post);
	return $postName['i_postname'];
}
/*function deptname($sid){
	$dept = "SELECT `i_deptname` FROM ` i_departments` WHERE `i_departmentsid`='" . $sid . "'";
    $deptName = getarrayassoc($dept);
	return $deptName['i_deptname'];
 }
 
 function postname($sid){
	$post = "SELECT `i_postname` FROM ` i_deptposts` WHERE `i_deptpostsid`='" . $sid. "'";
    $postName = getarrayassoc($post);
	return $postName['i_postname'];
 }*/

function studentname($studentid)
{
	$sel_student = "SELECT  `ic_student_username` FROM `i_preadmission` WHERE `i_preadmissionid`='" . $studentid . "'";
	$studentName = getarrayassoc($sel_student);
	return  $studentName['ic_student_username'];
}
function libcategoryname($sid)
{
	$sel_category = "SELECT  `lb_categoryname` FROM `i_categorylibrary` WHERE `i_categorylibraryid`='" . $sid . "'";
	$categotyName = getarrayassoc($sel_category);
	return  $categotyName['lb_categoryname'];
}
function libsubctegoryname($sid)
{
	$sel_subcat = "SELECT  `subcat_scatname` FROM `i_subcategory` WHERE `i_subcategoryid`='" . $sid . "'";
	$subcategoryName = getarrayassoc($sel_subcat);
	return  $subcategoryName['subcat_scatname'];
}
function schoolfees($from_finance, $to_finance)
{
	$sel_schoolgrandfee = "SELECT SUM(`feeamount`) AS SUMAMT FROM `i_feepaid` WHERE fi_fromdate='" . $from_finance . "' 
	                                                                             AND fi_todate = '" . $to_finance . "'";
	$schoolgrandfee_data = getarrayassoc($sel_schoolgrandfee);
	return $schoolgrandfee_data['SUMAMT'];
}
// generate URL
function buildurl($arr_url)
{
	$str_querystring = "?";
	$amp = "";
	if (is_array($arr_url)) {
		foreach ($arr_url as $param => $value) {
			if (!empty($param)) {
				$str_querystring .= $amp . $param . "=" . $value;
				$amp = "&";
			}
		}
	}
	return $str_querystring;
}

function getSqlNumber($sqlQuery)
{
	$query = @mysqli_query($GLOBALS['db'], $sqlQuery);
	$result = @mysqli_num_rows($query);
	@mysqli_free_result($query);
	return $result;
}

//extract numbers from a string 
function extract_numbers($string)
{
	preg_match_all('/([\d]+)/', $string, $match);
	return $match[0];
}

/*********************************************************/
/*                  Fetch Data globals                   */
/*********************************************************/

function fetch_global()
{

	$args = func_get_args();

	while (list(, $key) = ieach($args)) {

		if (isset($_GET[$key])) $value = $_GET[$key];
		if (isset($_POST[$key])) $value = $_POST[$key];

		if (isset($value)) {

			if (!ini_get('magic_quoti_gpc')) {

				if (!is_array($value))
					$value = addslashes($value);
				else
					$value = sm_slasharray($value);
			}
			//$value = stripslashes($value);
			$GLOBALS[$key] = $value;
			unset($value);
		}
	}
}


function sm_registerglobal_no()
{

	$args = func_get_args();

	while (list(, $key) = ieach($args)) {

		if (isset($_GET[$key])) $value = $_GET[$key];
		if (isset($_POST[$key])) $value = $_POST[$key];

		if (isset($value)) {

			if (!ini_get('magic_quoti_gpc')) {

				if (!is_array($value))
					$value = addslashes($value);
				else
					$value = sm_slasharray($value);
			}
			$value = stripslashes($value);
			$GLOBALS[$key] = $value;
			unset($value);
		}
	}
}


function sm_slasharray($a)
{

	while (list($k, $v) = ieach($a)) {

		if (!is_array($v))
			$a[$k] = addslashes($v);
		else
			$a[$k] = sm_slasharray($v);
	}

	reset($a);
	return ($a);
}

//word wrap function
function utf8_wordwrap($str, $width = 75, $break = "\n", $cut = false)
{
	return utf8_encode(wordwrap(utf8_decode($str), $width, $break, $cut));
}


/**
 * Random generate Password
 */
function get_rand_id($length = 8)
{
	if ($length > 0) {
		$rand_id = "";
		for ($i = 1; $i <= $length; $i++) {
			do {
				mt_srand((float)microtime() * 1000000);
				$num = mt_rand(48, 122);
			} while (($num > 57 && $num < 65) || ($num > 90 && $num < 97));
			$rand_id .= chr($num);
		}
	}
	return $rand_id;
}

function checkCreditCard($cardnumber, $cardname, &$errornumber, &$errortext)
{

	// Define the cards we support. You may add additional card types.
	// Name:      As in the selection box of the form - must be same as user's
	// Length:    List of possible valid lengths of the card number for the card
	// prefixes:  List of possible prefixes for the card
	// checkdigit Boolean to say whether there is a check digit
	// Don't forget - all but the last array definition needs a comma separator!

	$cards = array(
		array(
			'name' => 'American Express',
			'length' => '15',
			'prefixes' => '34,37',
			'checkdigit' => true
		),
		array(
			'name' => 'Carte Blanche',
			'length' => '14',
			'prefixes' => '300,301,302,303,304,305,36,38',
			'checkdigit' => true
		),
		array(
			'name' => 'Diners Club',
			'length' => '14',
			'prefixes' => '300,301,302,303,304,305,36,38',
			'checkdigit' => true
		),
		array(
			'name' => 'Discover',
			'length' => '16',
			'prefixes' => '6011',
			'checkdigit' => true
		),
		array(
			'name' => 'Enroute',
			'length' => '15',
			'prefixes' => '2014,2149',
			'checkdigit' => true
		),
		array(
			'name' => 'JCB',
			'length' => '15,16',
			'prefixes' => '3,1800,2131',
			'checkdigit' => true
		),
		array(
			'name' => 'Maestro',
			'length' => '16,18',
			'prefixes' => '5020,6',
			'checkdigit' => true
		),
		array(
			'name' => 'MasterCard',
			'length' => '16',
			'prefixes' => '51,52,53,54,55',
			'checkdigit' => true
		),
		array(
			'name' => 'Solo',
			'length' => '16,18,19',
			'prefixes' => '6334,6767',
			'checkdigit' => true
		),
		array(
			'name' => 'Switch',
			'length' => '16,18,19',
			'prefixes' => '4903,4905,4911,4936,564182,633110,6333,6759',
			'checkdigit' => true
		),
		array(
			'name' => 'Visa',
			'length' => '13,16',
			'prefixes' => '4',
			'checkdigit' => true
		),
		array(
			'name' => 'Visa Electron',
			'length' => '16',
			'prefixes' => '417500,4917,4913',
			'checkdigit' => true
		)
	);



	$ccErrorNo = 0;

	$ccErrors[0] = "Unknown card type";
	$ccErrors[1] = "No card number provided";
	$ccErrors[2] = "Credit card number has invalid format";
	$ccErrors[3] = "Credit card number is invalid";
	$ccErrors[4] = "Credit card number is wrong length";

	// Establish card type
	$cardType = -1;
	for ($i = 0; $i < sizeof($cards); $i++) {
		// See if it is this card (ignoring the case of the string)
		if (strtolower($cardname) == strtolower($cards[$i]['name'])) {
			$cardType = $i;
			break;
		}
	}

	// If card type not found, report an error
	if ($cardType == -1) {
		$errornumber = 0;
		$errortext = $ccErrors[$errornumber];
		return false;
	}

	// Ensure that the user has provided a credit card number
	if (strlen($cardnumber) == 0) {
		$errornumber = 1;
		$errortext = $ccErrors[$errornumber];
		return false;
	}

	// Remove any spaces from the credit card number
	$cardNo = str_replace(' ', '', $cardnumber);

	// Check that the number is numeric and of the right sort of length.
	if (!preg_match('^[0-9]{13,19}$', $cardNo)) {
		$errornumber = 2;
		$errortext = $ccErrors[$errornumber];
		return false;
	}

	// Now check the modulus 10 check digit - if required
	if ($cards[$cardType]['checkdigit']) {
		$checksum = 0;                                  // running checksum total
		$mychar = "";                                   // next char to process
		$j = 1;                                         // takes value of 1 or 2

		// Process each digit one by one starting at the right
		for ($i = strlen($cardNo) - 1; $i >= 0; $i--) {

			// Extract the next digit and multiply by 1 or 2 on alternative digits.      
			$calc = $cardNo[$i] * $j;

			// If the result is in two digits add 1 to the checksum total
			if ($calc > 9) {
				$checksum = $checksum + 1;
				$calc = $calc - 10;
			}

			// Add the units element to the checksum total
			$checksum = $checksum + $calc;

			// Switch the value of j
			if ($j == 1) {
				$j = 2;
			} else {
				$j = 1;
			};
		}

		// All done - if checksum is divisible by 10, it is a valid modulus 10.
		// If not, report an error.
		if ($checksum % 10 != 0) {
			$errornumber = 3;
			$errortext = $ccErrors[$errornumber];
			return false;
		}
	}

	// The following are the card-specific checks we undertake.

	// Load an array with the valid prefixes for this card
	$prefix = explode(',', $cards[$cardType]['prefixes']);

	// Now see if any of them match what we have in the card number  
	$PrefixValid = false;
	for ($i = 0; $i < sizeof($prefix); $i++) {
		$exp = '^' . $prefix[$i];
		if (preg_match($exp, $cardNo)) {
			$PrefixValid = true;
			break;
		}
	}

	// If it isn't a valid prefix there's no point at looking at the length
	if (!$PrefixValid) {
		$errornumber = 3;
		$errortext = $ccErrors[$errornumber];
		return false;
	}

	// See if the length is valid for this card
	$LengthValid = false;
	$lengths = explode(',', $cards[$cardType]['length']);
	for ($j = 0; $j < sizeof($lengths); $j++) {
		if (strlen($cardNo) == $lengths[$j]) {
			$LengthValid = true;
			break;
		}
	}

	// See if all is OK by seeing if the length was valid. 
	if (!$LengthValid) {
		$errornumber = 4;
		$errortext = $ccErrors[$errornumber];
		return false;
	};

	// The credit card is in the required format.
	return true;
}

/*
* Getting the Student Details
**/

function get_studentdetails($stud_id)
{
	$get_student = "SELECT * FROM `i_preadmission` where `i_preadmissionid`=$stud_id";
	return getarrayassoc($get_student);
}

/*
* Getting the Room Allotment Details
**/

function get_roomallot_details($raid)
{
	$get_room = "SELECT * FROM `i_roomallotment` where `i_roomallotmentid`=$raid";
	return getarrayassoc($get_room);
}

/*

* get rooms for building 
*/
function get_room($i_hostelbuldid)
{
	$classi_data = array();
	$sel_classes    = "SELECT * FROM `i_hostelroomid` WHERE `i_hostelroomid`= '$i_hostelbuldid'";
	$rs_classes     = mysqli_query($GLOBALS['db'], $sel_classes);
	if (mysqli_num_rows($rs_classes) > 0) {
		while ($classi_det = mysqli_fetch_assoc($rs_classes)) {
			$classi_data[] = $classi_det;
		}
		return $classi_data;
	}
	return false;
}
/**

 * Getting the Room Details
 **/

function get_room_details($roomid)
{
	$get_room = "SELECT * FROM `i_hostelroom` where `i_hostelroomid`=$roomid";
	$rs_room = mysqli_query($GLOBALS['db'], $get_room);
	$roomname = mysqli_fetch_assoc($rs_room);
	return $roomname;
}

/*
* Getting the Staff Details
**/

function get_staffdetails($staff_id)
{
	$get_staff = "SELECT * FROM `i_staff` where `i_staffid`='$staff_id'";
	return  getarrayassoc($get_staff);
}

/*
* Getting the class groups
**/

function get_groups()
{
	$sel_group = "SELECT * FROM `i_groups`";
	return getamultiassoc($sel_group);
}

/*
* Getting the group name
**/

function get_groupname($groupid)
{
	$get_group = "SELECT * FROM `i_groups` where `i_groupsid`='" . $groupid . "'";
	return  getarrayassoc($get_group);
}
function get_schoolname($schoolid)
{
	$get_school = "SELECT * FROM `i_schools` where `school_id`='" . $schoolid . "'";
	return  getarrayassoc($get_school);
}
/** 
 * Feteching the all classes under the group 
 */
function getClasses($groupid = "")
{
	if ($groupid != "") {
		$cond = " WHERE i_groupid = $groupid ";
	}
	$sel_classes    = "SELECT * FROM `i_classes` $cond ";
	return getamultiassoc($sel_classes);
}

/** 
 * Feteching the all Exams
 */
function get_Exams()
{
	$sel_exams    = "SELECT * FROM `i_exam` WHERE 1";
	return getamultiassoc($sel_exams);
}

/** 
 * Fetching All the class 
 */
function getallClasses()
{
	$classi_data    = "SELECT * FROM `i_classes` ORDER BY `i_classesid` ASC";
	return getamultiassoc($classi_data);
}

/**
 * Fetch classes data for class id 
 */
function getclassdata($classid)
{
	$get_group = "SELECT * FROM `i_classes` where `i_classesid`='" . $classid . "'";
	return  getarrayassoc($get_group);
}

/** 

 * Getting the Subjects
 **/

function gettingSubject($classid)
{
	if ($classid != "") {
		$cond = "WHERE i_subjectshortname='$classid'";
	} else {
		$cond = "";
	}

	$sel_subject = "SELECT * FROM `i_subject` $cond ORDER BY `i_subjectid` ASC";
	//$sel_subject = "SELECT * FROM `i_subject` WHERE `i_subjectshortname` ='$sub_class'";
	return getamultiassoc($sel_subject);
}
/**
 * Get Subjects details
 */
function getsubjectdet($subjectid)
{
	$sel_subjects = "SELECT * FROM `i_subject` WHERE `i_subjectid` ='$subjectid'";
	return  getarrayassoc($sel_subjects);
}
/*
* Getting the Departments
**/

function gettingDept()
{
	$sel_dept = "SELECT * FROM `i_departments` ORDER BY `i_deptid` ASC";
	return getamultiassoc($sel_dept);
}
/**
 * Get Department details
 */
function getsdept($deptid)
{
	$sel_dept = "SELECT * FROM `i_departments` WHERE `i_deptid` ='$deptid'";
	return  getarrayassoc($sel_dept);
}
/*

/**


* Getting the Financial Accounting groups
**/

function groups_finance()
{
	$groups_array = array();
	$sel_group = "SELECT * FROM `i_groups`";
	$rs_group = mysqli_query($GLOBALS['db'], $sel_group);

	if (mysqli_num_rows($rs_group) > 0) {
		while ($group_data = mysqli_fetch_assoc($rs_group)) {
			$groups_array[] = $group_data;
		}
		return $groups_array;
	}
	return $groups_array;
}

/*
* Getting the Financial Accounting  Voucher
**/

function voucher_finance()
{
	$groups_array = array();
	$sel_group = "SELECT * FROM `i_voucher`";
	$rs_group = mysqli_query($GLOBALS['db'], $sel_group);

	if (mysqli_num_rows($rs_group) > 0) {
		while ($group_data = mysqli_fetch_assoc($rs_group)) {
			$groups_array[] = $group_data;
		}
		return $groups_array;
	}
	return $groups_array;
}
/*

* Getting the Financial Ledgure
**/

function ledger_finance()
{
	$groups_array = array();
	$sel_group = "SELECT * FROM `i_ledger`";
	$rs_group = mysqli_query($GLOBALS['db'], $sel_group);

	if (mysqli_num_rows($rs_group) > 0) {
		while ($group_data = mysqli_fetch_assoc($rs_group)) {
			$groups_array[] = $group_data;
		}
		return $groups_array;
	}
	return $groups_array;
}

/*

* Getting the Financial Ledgure
**/

function department()
{
	$groups_array = array();
	$sel_group = "SELECT * FROM `i_departments`";
	$rs_group = mysqli_query($GLOBALS['db'], $sel_group);

	if (mysqli_num_rows($rs_group) > 0) {
		while ($group_data = mysqli_fetch_assoc($rs_group)) {
			$groups_array[] = $group_data;
		}
		return $groups_array;
	}
	return $groups_array;
}

/*

* Getting the Financial Vocture For Particular Vocture type
**/

function voucher_partypes($type)
{
	$groups_array = array();
	$sel_group = "SELECT * FROM `i_voucher` WHERE voucher_mode='" . $type . "'";
	$rs_group = mysqli_query($GLOBALS['db'], $sel_group);

	if (mysqli_num_rows($rs_group) > 0) {
		while ($group_data = mysqli_fetch_assoc($rs_group)) {
			$groups_array[] = $group_data;
		}
		return $groups_array;
	}
	return $groups_array;
}


/*

* Getting the sum Total for Particular Vocture
**/

function voucher_sumforselvoc($type)
{
	$sel_group = "SELECT * FROM `i_voucherentry` where i_vouchertype = '$type'";
	$rs_group = mysqli_query($GLOBALS['db'], $sel_group);
	$tot = 0;
	if (mysqli_num_rows($rs_group) > 0) {
		while ($group_data = mysqli_fetch_assoc($rs_group)) {
			$tot = $tot + $group_data['i_amount'];
		}
		return $tot;
	}
	return $tot;
}


function vouchersumforselvoc($type, $from_finance, $to_finance)
{
	$sel_group = "SELECT * FROM `i_voucherentry` where i_vouchertype = '$type'
	              AND ve_fromfinance BETWEEN  '" . $from_finance . "' AND '" . $to_finance . "'
				  AND ve_tofinance BETWEEN    '" . $from_finance . "' AND '" . $to_finance . "'";
	$rs_group = mysqli_query($GLOBALS['db'], $sel_group);
	$tot = 0;
	if (mysqli_num_rows($rs_group) > 0) {
		while ($group_data = mysqli_fetch_assoc($rs_group)) {
			$tot = $tot + $group_data['i_amount'];
		}
		return $tot;
	}
	return $tot;
}
/*

* Getting the Financial Accounting  Voucher for vocture id
**/

function voucherid_finance($voucherid)
{
	$get_voucher = "SELECT * FROM `i_voucher` where `i_voucherid`=$voucherid";
	$rs_voucher = mysqli_query($GLOBALS['db'], $get_voucher);
	$vouchername = mysqli_fetch_assoc($rs_voucher);
	return $vouchername;
}


/*

* Feteching All Posts from Staff table
$obj_postlist   = new i_deptposts();
$i_postList = $obj_postlist->GetList(array(array("i_postshortname","=","$st_department")));

	$sel_classes    = "SELECT * i_deptposts WHERE `i_postshortname`=`$st_department` ";
	
*/
function getallPosts($st_department)
{
	$classi_data = array();
	$sel_classes    = "SELECT * FROM `i_deptposts` WHERE `i_postshortname` = '$st_department' ";
	$rs_classes     = mysqli_query($GLOBALS['db'], $sel_classes);
	if (mysqli_num_rows($rs_classes) > 0) {
		while ($classi_det = mysqli_fetch_assoc($rs_classes)) {
			$classi_data[] = $classi_det;
		}
		return $classi_data;
	}
	return false;
}

function getallsubject($st_class)
{
	$classi_data = array();
	$sel_classes    = "SELECT * FROM `i_subject` WHERE `i_subjectshortname` = '$st_class' ";
	$rs_classes     = mysqli_query($GLOBALS['db'], $sel_classes);
	if (mysqli_num_rows($rs_classes) > 0) {
		while ($classi_det = mysqli_fetch_assoc($rs_classes)) {
			$classi_data[] = $classi_det;
		}
		return $classi_data;
	}
	return false;
}

/*

* Feteching All Leave Types fron Leaves Table*/
function getallleaves($posttype)
{
	$classi_data = array();
	$sel_classes    = "SELECT DISTINCT `lev_type` FROM `i_leavemaster` where `lev_post`='$posttype'";
	$rs_classes     = mysqli_query($GLOBALS['db'], $sel_classes);
	if (mysqli_num_rows($rs_classes) > 0) {
		while ($classi_det = mysqli_fetch_assoc($rs_classes)) {
			$classi_data[] = $classi_det;
		}
		return $classi_data;
	}
	return false;
}

/*

* Fetching Leave type for remarks for staff attendance*/
function get_attend_remark($post)
{
	$classi_data = array();
	$sel_classes    = "SELECT DISTINCT `lev_type`  FROM `i_leavemaster` WHERE `lev_post` = '$post'";
	$rs_classes     = mysqli_query($GLOBALS['db'], $sel_classes);
	if (mysqli_num_rows($rs_classes) > 0) {
		while ($classi_det = mysqli_fetch_assoc($rs_classes)) {
			$classi_data[] = $classi_det;
		}
		return $classi_data;
	}
	return false;
}
/**
 * get vehicle name and vehicle number
 */
function get_vehiclenumber()
{
	$vehiclenumber_array = array();

	$sel_vehicle_nbr = "SELECT `tr_vehicle_no` FROM `i_transport` ";

	$rs_vehicle_nbr = mysqli_query($GLOBALS['db'], $sel_vehicle_nbr);

	if (mysqli_num_rows($rs_vehicle_nbr) > 0) {
		while ($vehiclenumber_data = mysqli_fetch_assoc($rs_vehicle_nbr)) {
			$vehiclenumber_array[] = $vehiclenumber_data;
		}
		return $vehiclenumber_array;
	}
	return $vehiclenumber_array;
}
/**
 * get vehicle name and vehicle number
 */
function get_vehiclename($vehicle_no)
{
	$sel_vehiclename = "SELECT * FROM `i_transport` where `i_transportid`='$vehicle_no'";
	$rs_vehiclename = mysqli_query($GLOBALS['db'], $sel_vehiclename);
	return mysqli_fetch_assoc($rs_vehiclename);
}
/**
 * get student name for attendance
 */
function get_StudAttend($at_std_class)
{
	$classi_data = array();
	/*  $sel_classes    = "SELECT * FROM `i_preadmission` WHERE `ic_class`= '$at_std_class' AND status!= 'inactive' AND status!= 'resultawaiting' 
	                AND ic_fromdate = '".$_SESSION['eschools']['from_acad']."'  AND ic_todate= '".$_SESSION['eschools']['to_acad']."'";
 */
	$sel_classes    = "SELECT * FROM `i_preadmission` WHERE `ic_class`= '$at_std_class' AND status!= 'inactive' AND status!= 'resultawaiting' order by ic_name ASC";

	//echo $sel_classes;
	$rs_classes     = mysqli_query($GLOBALS['db'], $sel_classes);
	if (mysqli_num_rows($rs_classes) > 0) {
		while ($classi_det = mysqli_fetch_assoc($rs_classes)) {
			$classi_data[] = $classi_det;
		}
		return $classi_data;
	}
	return false;
}
function get_StudAttendsec($at_std_class, $at_std_sec)
{
	$classi_data = array();
	/*  $sel_classes    = "SELECT * FROM `i_preadmission` WHERE `ic_class`= '$at_std_class' AND status!= 'inactive' AND status!= 'resultawaiting' 
	                AND ic_fromdate = '".$_SESSION['eschools']['from_acad']."'  AND ic_todate= '".$_SESSION['eschools']['to_acad']."'";
 */
	$sel_classes    = "SELECT * FROM `i_preadmission` a, i_sections_student b WHERE a.i_preadmissionid=b.student_id and a.ic_class= '$at_std_class' and b.section_id='$at_std_sec'  order by a.ic_name ASC";

	//echo $sel_classes;
	$rs_classes     = mysqli_query($GLOBALS['db'], $sel_classes);
	if (mysqli_num_rows($rs_classes) > 0) {
		while ($classi_det = mysqli_fetch_assoc($rs_classes)) {
			$classi_data[] = $classi_det;
		}
		return $classi_data;
	}
	return false;
}

function get_StudAttendsecs($at_std_class, $at_std_sec, $at_attendance_date)
{
	$classi_data = array();
	/*  $sel_classes    = "SELECT * FROM `i_preadmission` WHERE `ic_class`= '$at_std_class' AND status!= 'inactive' AND status!= 'resultawaiting' 
	                AND ic_fromdate = '".$_SESSION['eschools']['from_acad']."'  AND ic_todate= '".$_SESSION['eschools']['to_acad']."'";
 */
	$sel_classes    = "SELECT * FROM `i_preadmission` a, i_sections_student b WHERE a.i_preadmissionid=b.student_id and a.ic_class= '$at_std_class' and b.section_id='$at_std_sec'  and a.status!= 'inactive' AND a.status!= 'resultawaiting' and a.admission_date<='" . $at_attendance_date . "' order by a.ic_name ASC";

	//echo $sel_classes;
	$rs_classes     = mysqli_query($GLOBALS['db'], $sel_classes);
	if (mysqli_num_rows($rs_classes) > 0) {
		while ($classi_det = mysqli_fetch_assoc($rs_classes)) {
			$classi_data[] = $classi_det;
		}
		return $classi_data;
	}
	return false;
}

/**
 * get student name for attendance using reg no
 */
function get_StudAttend_Reg($at_stdregno)
{
	$classi_data = array();
	$sel_classes    = "SELECT * FROM `i_preadmission` WHERE `ic_serialno`= '$at_stdregno'";
	$rs_classes     = mysqli_query($GLOBALS['db'], $sel_classes);
	if (mysqli_num_rows($rs_classes) > 0) {
		while ($classi_det = mysqli_fetch_assoc($rs_classes)) {
			$classi_data[] = $classi_det;
		}
		return $classi_data;
	}
	return false;
}
/**
 * get student name for attendance using reg no
 */
function get_StudAttend_Reg1($at_stdregno)
{
	$classi_data = array();
	$sel_classes    = "SELECT * FROM `i_preadmission` WHERE `i_preadmissionid`= '$at_stdregno'";
	$rs_classes     = mysqli_query($GLOBALS['db'], $sel_classes);
	if (mysqli_num_rows($rs_classes) > 0) {
		while ($classi_det = mysqli_fetch_assoc($rs_classes)) {
			$classi_data[] = $classi_det;
		}
		return $classi_data;
	}
	return false;
}
function get_StudAttend_Reg2($at_stdregno, $at_std_wise_sec_report)
{
	$classi_data = array();
	$sel_classes    = "SELECT * FROM `i_preadmission` a, i_sections_student b WHERE a.i_preadmissionid=b.section_id and b.section_id='" . $at_std_wise_sec_report . "' and`i_preadmissionid`= '$at_stdregno'";
	$rs_classes     = mysqli_query($GLOBALS['db'], $sel_classes);
	if (mysqli_num_rows($rs_classes) > 0) {
		while ($classi_det = mysqli_fetch_assoc($rs_classes)) {
			$classi_data[] = $classi_det;
		}
		return $classi_data;
	}
	return false;
}
/*
 get student name for Classwisw reporting

function get_StudAttend_report($at_std_class){
	$classi_data = array();
	$sel_classes    = "SELECT DISTINCT `at_reg_no` ,`at_stud_name` FROM `i_attend_student` WHERE  `at_attendance_date` BETWEEN  '$from_acad' AND  '$to_acad' AND `at_std_class`= '$at_std_class'";
	return getamultiassoc($sel_classes);
  
} */
/**
 * get Departments for attendance
 */
function get_DeptAttend()
{
	$classi_data = array();
	echo $sel_classes    = "SELECT DISTINCT `st_department` FROM `i_staff` ";
	$rs_classes     = mysqli_query($GLOBALS['db'], $sel_classes);

	if (mysqli_num_rows($rs_classes) > 0) {
		while ($classi_det = mysqli_fetch_assoc($rs_classes)) {
			$classi_data[] = $classi_det;
		}
		return $classi_data;
	}
	return false;
}

/**
 * get Departments for attendance in staffwise reporting.......... 
 */
function get_DeptAttend_report($at_staff_dept1)
{
	$classi_data = array();
	$sel_classes    = "SELECT DISTINCT `at_staff_name` , `at_staff_id`
FROM `i_attend_staff`
WHERE `at_staff_dept` ='$at_staff_dept1'";
	$rs_classes     = mysqli_query($GLOBALS['db'], $sel_classes);

	if (mysqli_num_rows($rs_classes) > 0) {
		while ($classi_det = mysqli_fetch_assoc($rs_classes)) {
			$classi_data[] = $classi_det;
		}
		return $classi_data;
	}
	return false;
}

/**
 * get Departments for attendance
 */
function getstudentdetails($at_staff_dept)
{
	$classi_data = array();
	$sel_classes    = "SELECT * FROM `i_staff` WHERE `st_department`= '$at_staff_dept' AND status='added' AND selstatus='accepted' AND tcstatus='notissued'";
	$rs_classes     = mysqli_query($GLOBALS['db'], $sel_classes);

	if (mysqli_num_rows($rs_classes) > 0) {
		while ($classi_det = mysqli_fetch_assoc($rs_classes)) {
			$classi_data[] = $classi_det;
		}
		return $classi_data;
	}
	return false;
}
/*
get total number of working days

function get_workingdays_studentwise($at_std_class_report) {
$get_days = "SELECT COUNT(at_attendance_date)  FROM `i_attend_student`  WHERE  `at_attendance_date`  BETWEEN '$from' AND '$to'  AND `at_std_class`='$at_std_wise_class_report' AND `at_reg_no`='$at_stdregno' AND `at_stud_name` = '$at_std_wise_name'";
	$rs_days= mysqli_query($GLOBALS['db'], $get_days);
	
	return mysqli_num_rows($rs_days);
} */
/**
 *get total number of working days for student wise
 */
function get_workingdays($at_std_class_report, $at_stdregno)
{
	$classi_data = array();
	$get_days = "SELECT COUNT(`at_attendance_date`) FROM `i_attend_student` WHERE `at_std_class`='$at_std_class_report' AND `at_reg_no`='$at_stdregno'";
	return getarrayassoc($get_days);
}

/**
 *get total number of present days
 */
function get_presentdays($at_std_class_report, $name)
{
	$get_presentdays = "SELECT *
FROM `i_attend_student`
WHERE `at_attendance` = 'P'
AND `at_reg_no` = '$name'
AND `at_std_class` = '$at_std_class_report' ";
	$rs_presentdays = mysqli_query($GLOBALS['db'], $get_presentdays);

	return mysqli_num_rows($rs_presentdays);
}
/**
 *get total number of present days
 */
function get_presentdays_studentwise($from, $to, $at_std_wise_class_report, $at_stdregno)
{
	$get_presentdays = "SELECT *  FROM `i_attend_student`  WHERE  `at_attendance_date`  BETWEEN '$from' AND '$to'  AND `at_std_class`='$at_std_wise_class_report' AND `at_reg_no`='$at_stdregno'  AND `at_attendance` = 'P'";
	$rs_presentdays = mysqli_query($GLOBALS['db'], $get_presentdays);
	return mysqli_num_rows($rs_presentdays);
}

function get_presentdays_studentwises($from, $to, $at_std_wise_class_report, $at_std_subject, $at_stdregno)
{
	$get_presentdays = "SELECT *  FROM `i_attend_student`  WHERE  `at_attendance_date`  BETWEEN '$from' AND '$to'  AND `at_std_class`='$at_std_wise_class_report' and at_std_subject='$at_std_subject' AND `at_reg_no`='$at_stdregno'  AND `at_attendance` = 'P'";
	$rs_presentdays = mysqli_query($GLOBALS['db'], $get_presentdays);
	return mysqli_num_rows($rs_presentdays);
}
/**
 *get total number of working days for staff
 */
function get_workingdays_staff($at_staff_dept1, $name)
{
	$get_days_staff = "SELECT  COUNT(`at_staff_date`) FROM `i_attend_staff` WHERE  `at_staff_dept`='$at_staff_dept1' AND `at_staff_name` = '$name' ";


	return getarrayassoc($get_days_staff);
}
/**
 *get total number of present days for staff
 */
function get_presentdays_staff($at_staff_dept1, $name)
{
	$get_presentdays_staff = "SELECT COUNT(`at_staff_date`) FROM `i_attend_staff` WHERE `at_staff_attend` = 'P' AND `at_staff_name` = '$name' AND `at_staff_dept` = '$at_staff_dept1'";


	return getarrayassoc($get_presentdays_staff);
}

/**
 *get total number of present days for studentwise
 */
function get_studentwise_attend($at_std_class_report, $name)
{
	$get_presentdays = "SELECT *
FROM `i_attend_student`
WHERE `at_attendance` = 'P'
AND `at_stud_name` = '$name'
AND `at_std_class` = '$at_std_class_report' ";
	$rs_presentdays = mysqli_query($GLOBALS['db'], $get_presentdays);

	return mysqli_num_rows($rs_presentdays);
}
/**
 * get student name for studentwise reporting
 */
function get_StudWise_report($from, $to, $at_std_wise_class_report, $at_stdregno)
{
	$classi_data = array();
	$sel_classes    = "SELECT COUNT(*) FROM `i_attend_student`  WHERE  `at_attendance_date`  BETWEEN '$from' AND '$to'  AND `at_std_class`='$at_std_wise_class_report' AND `at_reg_no`='$at_stdregno' ";
	$rs_classes     = mysqli_query($GLOBALS['db'], $sel_classes);
	if (mysqli_num_rows($rs_classes) > 0) {
		while ($classi_det = mysqli_fetch_assoc($rs_classes)) {
			$classi_data[] = $classi_det;
		}
		return $classi_data;
	}
	return false;
}

function get_StudWise_secreport($from, $to, $at_std_wise_class_report, $at_std_wise_sec_report, $at_stdregno)
{
	$classi_data = array();
	$sel_classes    = "SELECT COUNT(*) FROM `i_attend_student`  WHERE  `at_attendance_date`  BETWEEN '$from' AND '$to'  AND `at_std_class`='$at_std_wise_class_report' AND `at_std_sec`='$at_std_wise_sec_report' AND `at_reg_no`='$at_stdregno' ";
	$rs_classes     = mysqli_query($GLOBALS['db'], $sel_classes);
	if (mysqli_num_rows($rs_classes) > 0) {
		while ($classi_det = mysqli_fetch_assoc($rs_classes)) {
			$classi_data[] = $classi_det;
		}
		return $classi_data;
	}
	return false;
}


function  get_StudWise_reports($from, $to, $at_std_wise_class_report, $at_std_subject, $at_stdregno)
{
	$classi_data = array();
	$sel_classes    = "SELECT COUNT(*) FROM `i_attend_student`  WHERE  `at_attendance_date`  BETWEEN '$from' AND '$to'  AND `at_std_class`='$at_std_wise_class_report' and at_std_subject='$at_std_subject' AND `at_reg_no`='$at_stdregno' ";
	$rs_classes     = mysqli_query($GLOBALS['db'], $sel_classes);
	if (mysqli_num_rows($rs_classes) > 0) {
		while ($classi_det = mysqli_fetch_assoc($rs_classes)) {
			$classi_data[] = $classi_det;
		}
		return $classi_data;
	}
	return false;
}

function get_workingdays_studentwise1($from, $to, $at_std_wise_class_report, $at_stdregno)
{
	$sel_no_days    = "SELECT *  FROM `i_attend_student`  WHERE  `at_attendance_date`  BETWEEN '$from' AND '$to'  AND `at_std_class`='$at_std_wise_class_report' AND `at_reg_no`='$at_stdregno' ";
	$rs_no_days    = mysqli_query($GLOBALS['db'], $sel_no_days);
	return mysqli_num_rows($rs_no_days);
}
function get_workingdays_studentwise11($from, $to, $at_std_wise_class_report, $at_std_subject, $at_stdregno)
{
	$sel_no_days    = "SELECT *  FROM `i_attend_student`  WHERE  `at_attendance_date`  BETWEEN '$from' AND '$to'  AND `at_std_class`='$at_std_wise_class_report' and at_std_subject='$at_std_subject' AND `at_reg_no`='$at_stdregno' ";
	$rs_no_days    = mysqli_query($GLOBALS['db'], $sel_no_days);
	return mysqli_num_rows($rs_no_days);
}
/** Selecting the categories for Knowledge Base
 */

function get_know_categories()
{
	$classi_data = array();
	$sel_category = "SELECT * FROM `i_knowledge_base` WHERE  status='active' AND parent_id='0'";
	$ri_category = mysqli_query($GLOBALS['db'], $sel_category);

	if (mysqli_num_rows($ri_category) > 0) {
		while ($classi_det = mysqli_fetch_assoc($ri_category)) {
			$classi_data[] = $classi_det;
		}
		return $classi_data;
	}
	return false;
}
/** Selecting the articles for categories for Knowledge Base
 */

function get_know_category_article($uid)
{
	$classi_data = array();
	$sel_category = "SELECT cat. * , art. * FROM i_knowledge_base cat, i_knowledge_articles art WHERE cat.status = 'active'AND cat.i_knowledge_baseid = art.kb_category_id AND  art.kb_category_id = '$uid' AND  art.status='active'";
	$ri_category = mysqli_query($GLOBALS['db'], $sel_category);

	if (mysqli_num_rows($ri_category) > 0) {
		while ($classi_det = mysqli_fetch_assoc($ri_category)) {
			$classi_data[] = $classi_det;
		}
		return $classi_data;
	}
	return false;
}
function get_know_category_article1($uid, $artid)
{
	$classi_data = array();
	$sel_category = "SELECT cat. * , art. * FROM i_knowledge_base cat, i_knowledge_articles art WHERE cat.status = 'active'AND cat.i_knowledge_baseid = art.kb_category_id AND  art.kb_category_id = '$uid' AND art.i_knowledge_articlesid='$artid'";
	$ri_category = mysqli_query($GLOBALS['db'], $sel_category);

	if (mysqli_num_rows($ri_category) > 0) {
		while ($classi_det = mysqli_fetch_assoc($ri_category)) {
			$classi_data[] = $classi_det;
		}
		return $classi_data;
	}
	return false;
}

/** Selecting the Subcategories for Knowledge Base
 */

function get_know_sub_categories($uid)
{
	$classi_data = array();
	$sel_sub_category = "SELECT * FROM `i_knowledge_base` where parent_id ='$uid' AND status = 'active'";
	$ri_sub_category = mysqli_query($GLOBALS['db'], $sel_sub_category);

	if (mysqli_num_rows($ri_sub_category) > 0) {
		while ($classi_det = mysqli_fetch_assoc($ri_sub_category)) {
			$classi_data[] = $classi_det;
		}
		return $classi_data;
	}
	return false;
}

/** Selecting the Sub Category id Articles for Knowledge Base
 */

function get_categoryid($uid)
{
	$classi_data = array();
	$sel_sub_category = "SELECT `i_knowledge_baseid` FROM `i_knowledge_base` WHERE `parent_id` = '$uid'";
	$ri_sub_category = mysqli_query($GLOBALS['db'], $sel_sub_category);
	return mysqli_fetch_assoc($ri_sub_category);
}
/** Selecting the Sub Category Articles for Knowledge Base
 */

function get_know_sub_article($sub_categoryid)
{
	$classi_data = array();
	echo $sel_sub_category = "SELECT `kb_article_name` FROM `i_knowledge_articles` WHERE `kb_category_id` = '$sub_categoryid'";
	$ri_sub_category = mysqli_query($GLOBALS['db'], $sel_sub_category);

	if (mysqli_num_rows($ri_sub_category) > 0) {
		while ($classi_det = mysqli_fetch_assoc($ri_sub_category)) {
			$classi_data[] = $classi_det;
		}
		return $classi_data;
	}
	return false;
}

/***
 ** Float checkoing
 * */
function float_validation($value)
{
	if (isset($value) && !empty($value)) {
		$value_format = $value;
		if (is_numeric($value_format)) {
			return true;
		}
	}
	return false;
}





//Disply Functions for debuggging

function session_print($ses = 'session', $dieaction = null)
{
	if ($ses == 'session') {
		echo "<pre>";
		print_r($_SESSION);
		echo "</pre>";
	} else {
		echo "<pre>";
		print_r($ses);
		echo "</pre>";
	}
	if (isset($dieaction) && ($dieaction) != null) {
		die;
	}
}
function array_print($name = array(), $dieaction = null)
{
	echo "<pre>";
	print_r($name);
	echo "</pre>";
	if (isset($dieaction) && ($dieaction) != null) {
		die;
	}
}

/**
 * Format the date into user defined format
 */

function formatDateCalender($cdate, $format = 'Y-m-d')
{
	if (str_contains($cdate, "-")) {
		$v = explode("-", $cdate);
		$nwdt = $v[1] . "/" . $v[2] . "/" . $v[0];
	} else {
		$v = explode("/", $cdate);
		$nwdt = $v[1] . "/" . $v[0] . "/" . $v[2];
	}
	$timestamp = strtotime($nwdt);
	$formatDateCalender = date($format, $timestamp);
	return $formatDateCalender;
}
function formatDBDateTOCalender($cdate, $format = 'd/m/Y')
{
	$timestamp = strtotime($cdate);
	$formatDateCalender = date($format, $timestamp);
	return $formatDateCalender;
}

function formatDateCalenderTime($cdate = "d/m/Y H:i:s", $format = 'Y-m-d')
{
	$v = explode("/", $cdate);
	$nwdt = $v[1] . "/" . $v[0] . "/" . $v[2];
	$timestamp = strtotime($nwdt);
	$formatDateCalenderTime = date($format, $timestamp);
	return $formatDateCalenderTime;
}
function DatabaseFormatTime($cdate, $format = 'm-d-Y')
{

	$timestamp = strtotime($cdate);
	$DatabaseFormated_date = date($format, $timestamp);
	return $DatabaseFormated_date;
}

function formatDateproject($cdate, $format = 'm/d/y')
{
	$f    = "l, F d, Y";
	$date   = date($f, $cdate);
	$timestamp = strtotime($date);
	$formatDateproject_date = date($format, $timestamp);
	return $formatDateproject_date;
}

function DatabaseFormat($cdate, $format = 'd-m-Y')
{

	$timestamp = strtotime($cdate);
	$DatabaseFormated_date = date($format, $timestamp);
	return $DatabaseFormated_date;
}

//08-Feb-4
function date_shrt_ymd($cdate, $format = 'y-M-j')
{
	$f         = "l, F d, Y";
	$date      = date($f, $cdate);
	$date_shrt_stamp = strtotime($date);
	$date_shrt = date($format, $date_shrt_stamp);
	return $date_shrt;
}


//Monday 04 Feb, 2008
function formatDate($cdate, $format = 'l d M, Y')
{
	$f         = "l, F d, Y";
	$date      = date($f, $cdate);
	$timestamp = strtotime($date);
	$formated_date = date($format, $timestamp);
	return $formated_date;
}

function formatLoginDate($cdate, $format = 'l d M, Y  g:i:s A')
{
	$f         = "l, F d, Y";
	$date      = date($f, $cdate);
	$timestamp     = strtotime($date);
	$formated_date = date($format, $timestamp);
	return $formated_date;
}

function formatJSDatetime($cdate, $format = 'm/d/Y H:i:s')
{

	## Format : 06/22/2007 22:22:05
	$f         = "l, F d, Y";
	$date      = date($f, $cdate);
	$timestamp     = strtotime($date);
	$formated_date = date($format, $timestamp);
	return $formated_date;
}

function formatDBDatetime($cdate, $format = 'Y-m-d H:i:s')
{
	## Format : 2007-06-27 01:01:01
	$f             = "l, F d, Y";
	$date          = date($f, $cdate);
	$timestamp     = strtotime($date);
	$formated_date = date($format, $timestamp);
	return $formated_date;
}

function formattime($time, $format = 'H:i:s')
{
	## Format :    10:01:02
	$timestamp     = strtotime($time);
	$formated_date = date($format, $timestamp);
	return $formated_date;
}

function randamString($len = 8)
{
	$string = md5(uniqid(rand()));
	$string	= strtoupper(substr($string, 0, $len));
	return $string;
}

/*************************************
	 Function for displaying time as 00:00
 **************************************/

function timedisplay($timetodisplay)
{
	$time = substr($timetodisplay, 0, 5);
	return $time;
}


function send_mail($to, $body, $subject, $fromaddress, $fromname, $attachments = false)
{
	$eol           = "\r\n";
	$mime_boundary = md5(time());
	$headers = '';
	# Common Headers
	$headers .= "From: " . $fromname . "<" . $fromaddress . ">" . $eol;
	$headers .= "Reply-To: " . $fromname . "<" . $fromaddress . ">" . $eol;
	$headers .= "Return-Path: " . $fromname . "<" . $fromaddress . ">" . $eol;    // these two to set reply address
	$headers .= "Message-ID: <" . time() . "-" . $fromaddress . ">" . $eol;
	$headers .= "X-Mailer: PHP v" . phpversion() . $eol;          // These two to help avoid spam-filters

	# Boundry for marking the explode & Multitype Headers
	$headers .= 'MIME-Version: 1.0' . $eol . $eol;
	$headers .= "Content-Type: multipart/mixed; boundary=\"" . $mime_boundary . "\"" . $eol . $eol;

	# Open the first part of the mail
	$msg = "--" . $mime_boundary . $eol;

	$htmlalt_mime_boundary = $mime_boundary . "_htmlalt"; //we must define a different MIME boundary for this section
	# Setup for text OR html -
	$msg .= "Content-Type: multipart/alternative; boundary=\"" . $htmlalt_mime_boundary . "\"" . $eol . $eol;

	# Text Version
	$msg .= "--" . $htmlalt_mime_boundary . $eol;
	$msg .= "Content-Type: text/plain; charset=iso-8859-1" . $eol;
	$msg .= "Content-Transfer-Encoding: 8bit" . $eol . $eol;
	$msg .= strip_tags(str_replace("<br>", "\n", substr($body, (strpos($body, "<body>") + 6)))) . $eol . $eol;

	# HTML Version
	$msg .= "--" . $htmlalt_mime_boundary . $eol;
	$msg .= "Content-Type: text/html; charset=iso-8859-1" . $eol;
	$msg .= "Content-Transfer-Encoding: 8bit" . $eol . $eol;
	$msg .= $body . $eol . $eol;

	//close the html/plain text alternate portion
	$msg .= "--" . $htmlalt_mime_boundary . "--" . $eol . $eol;

	if ($attachments !== false) {
		for ($i = 0; $i < count($attachments); $i++) {
			if (is_file($attachments[$i]["file"])) {
				# File for Attachment
				$file_name = substr($attachments[$i]["file"], (strrpos($attachments[$i]["file"], "/") + 1));

				$handle = fopen($attachments[$i]["file"], 'rb');
				$f_contents = fread($handle, filesize($attachments[$i]["file"]));
				$f_contents = chunk_explode(base64_encode($f_contents));    //Encode The Data For Transition using base64_encode();
				$f_type = filetype($attachments[$i]["file"]);
				fclose($handle);

				# Attachment
				$msg .= "--" . $mime_boundary . $eol;
				$msg .= "Content-Type: " . $attachments[$i]["content_type"] . "; name=\"" . $file_name . "\"" . $eol;  // sometimes i have to send MS Word, use 'msword' instead of 'pdf'
				$msg .= "Content-Transfer-Encoding: base64" . $eol;
				$msg .= "Content-Description: " . $file_name . $eol;
				$msg .= "Content-Disposition: attachment; filename=\"" . $file_name . "\"" . $eol . $eol; // !! This line needs TWO end of lines !! IMPORTANT !!
				$msg .= $f_contents . $eol . $eol;
			}
		}
	}

	# Finished
	$msg .= "--" . $mime_boundary . "--" . $eol . $eol;  // finish with two eol's for better security. see Injection.

	# SEND THE EMAIL
	ini_set(sendmail_from, $fromaddress);  // the INI lines are to force the From Address to be used !
	$mail_sent = mail($to, $subject, $msg, $headers);
	ini_restore(sendmail_from);
	return $mail_sent;
}

#Delete Icon
function deleteIcon()
{
	return '<img src="images/b_drop.png" border="0" alt="Delete">';
}

function editIcon()
{
	return '<img src="images/b_edit.png" border="0" alt="Edit">';
}

function viewIcon()
{
	return '<img src="images/b_browse.png" border="0" alt="View">';
}

/**
 * Pagination
 */

function paginateexte($start, $limit, $total, $otherParams = '')
{


	global $lang;
	global $pid;
	if ($otherParams != '') {
		$otherParams = "&" . $otherParams;
	}

	$allPages	 = ceil($total / $limit);
	$currentPage = floor($start / $limit) + 1;
	$pagination  = "";
	if ($allPages > 10) {
		$maxPages = ($allPages > 9) ? 9 : $allPages;

		if ($allPages > 9) {
			if ($currentPage >= 1 && $currentPage <= $allPages) {
				$pagination .= ($currentPage > 4) ? "<td> ... </td>" : " ";
				$minPages    = ($currentPage > 4) ? $currentPage : 5;
				$maxPages    = ($currentPage < $allPages - 4) ? $currentPage : $allPages - 4;

				for ($i = $minPages - 4; $i < $maxPages + 5; $i++) {
					$pagination .= ($i == $currentPage) ? "<td>" . $i . "</td>" : "<td><a href=\"?pid=" . $pid . "&start=" . (($i - 1) * $limit) . $otherParams . "\">" . $i . "</a></td>";
				}
				$pagination .= ($currentPage < $allPages - 4) ? "<td> ...</td> " : " ";
			} else {
				$pagination .= "<td> ...</td> ";
			}
		}
	} else {
		for ($i = 1; $i < $allPages + 1; $i++) {
			$pagination .= ($i == $currentPage) ? "<td>" . $i . "</td>" : "<td><a  href=\"?pid=" . $pid . "&start=" . (($i - 1) * $limit) . $otherParams . "\">" . $i . "</a></td>";
		}
	}

	if ($currentPage > 1) {

		$pagination = "<td><a  href=\"?pid=" . $pid . "&start=0" . $otherParams . "\"><strong>&laquo;</strong> First</a></td><td><a  href=\"?pid=" . $pid . "&start=" . (($currentPage - 2) * $limit) . $otherParams . "\"><strong >&laquo;</strong> Previous</a></td>" . $pagination;
	}
	if ($currentPage < $allPages) {

		$pagination .= "<td><a  href=\"?pid=" . $pid . "&start=" . ($currentPage * $limit) . $otherParams . "\">Next <strong>&raquo;</strong></a></td><td><a  href=\"?pid=" . $pid . "&start=" . (($allPages - 1) * $limit) . $otherParams . "\">Last <strong>&raquo;</strong></a></td>";
	}
	echo "<table align=\"center\" class=\"boxPagination\"><tr>" . $pagination . "</tr></table>";
}

/*************for thumbnail display**********/
function imageSource($image, $width = 100, $height = 100)
{
	return "includes/image_display.php?file=" . $image;
	return $image;
}
/***********eof**********/




function displayDate($date, $format = 'd/m/Y')
{
	$timestamp = strtotime($date);
	$date = date($format, $timestamp);
	return $date;
}

function displayDateTime($date, $format = 'F d, Y H:i:s')
{
	$timestamp = strtotime($date);
	$date = date($format, $timestamp);
	return $date;
}

function displayDateAndTime($date, $format = 'd/m/Y H:i:s')
{
	$timestamp = strtotime($date);
	$date = date($format, $timestamp);
	return $date;
}

/***********datediff**********/
function date_diff11($earlierDate, $laterDate)
{
	//returns an array of numeric values representing days, hours, minutes & seconds respectively
	$ret = array('days' => 0, 'hours' => 0, 'minutes' => 0, 'seconds' => 0);
	$totalsec = strtotime($laterDate) - strtotime($earlierDate);
	if ($totalsec >= 86400) {
		$ret['days'] = floor($totalsec / 86400);
		$totalsec = $totalsec % 86400;
	}
	if ($totalsec >= 3600) {
		$ret['hours'] = floor($totalsec / 3600);
		$totalsec = $totalsec % 3600;
	}
	if ($totalsec >= 60) {
		$ret['minutes'] = floor($totalsec / 60);
	}
	$ret['seconds'] = $totalsec % 60;
	return $ret;
}
/************eofdatediff**********/

/*Finding the difference between dates */
function dateDiff($startDate, $endDate)
{
	// Parse dates for conversion
	$startArry	= date_parse($startDate);
	$endArry	= date_parse($endDate);

	// Convert dates to Julian Days
	$start_date = GregorianToJD($startArry["month"], $startArry["day"], $startArry["year"]) . "</br>";
	$end_date   = GregorianToJD($endArry["month"], $endArry["day"], $endArry["year"]);
	// Return difference
	return round(($end_date - $start_date), 0);
}

//function to display the images
function displayimage($imgsrc, $thumbsize = "100", $alt = "Image", $title = "Images")
{
	if (file_exists($imgsrc)) {
		list($width, $height) = getimagesize($imgsrc);
		$imgratio = $width / $height;
		if ($imgratio > 1) {
			$newwidth = $thumbsize;
			$newheight = $thumbsize / $imgratio;
		} else {
			$newheight = $thumbsize;
			$newwidth = $thumbsize * $imgratio;
		}
		return '<img src="' . $imgsrc . '" width="' . $newwidth . '" height="' . $newheight . '" alt="' . $alt . '" border="0" title="' . $title . '" >';
	} else {
		return '<i>Image</i>';
	}
}

function get_trans_det($checkitem)
{
	$get_trans = "SELECT * FROM `i_transport` where `i_transportid`=$checkitem";
	return getamultiassoc($get_trans);
}

function get_day($day, $format = 'l')
{
	$v = explode("/", $day);
	$nwdt = $v[1] . "/" . $v[0] . "/" . $v[2];
	$timestamp = strtotime($nwdt);
	$dates = date($format, $timestamp);
	return $dates;
}

function fee_master($class, $feeparticularid)
{
	$sel_masterfee = "SELECT * FROM `i_feemaster` WHERE `i_feemasterid` = '$feeparticularid' AND `fee_class`='$class' ";
	return getarrayassoc($sel_masterfee);
}
function uploadanyfile($fieldname, $path = "", $newname = true, $type = "image", $allowed = "", $max_size = "")
{

	if ($path == "")
		$path = dirname(__FILE__) . "/";
	if (trim($allowed) == "" || $type == 'image') {
		$allowed = array('image/gif', 'image/pjpeg', 'image/jpeg', 'image/jpg', 'image/png');
	} else {
		$allowed = array('application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document');
	}
	if ($max_size == "")
		$max_size = 2000000;

	$upldfile = "";
	if ($fieldname != "")
		$upldfile = $_FILES[$fieldname];

	if ($newname) {
		$newname = $fieldname . rand(0, 99) . date("YmdHis") . "." . fileextension($upldfile['name']);
	}
	if (isset($upldfile) && $upldfile != "") {
		if (is_uploaded_file($upldfile['tmp_name'])) {
			if ($upldfile['size'] < $max_size) {
				if (in_array($upldfile['type'], $allowed)) {
					if (!file_exists($path . $newname)) {
						if (move_uploaded_file($upldfile['tmp_name'], $path . $newname)) {
							$returnstr = $newname;
						} else {
							$html_output = 'Upload failed!<br>';
							if (!is_writeable($path)) {
								$error = 'The Directory "' . $path . '" must be writeable!';
							} else {
								$html_output = 'An unknown error ocurred.';
							}
						}
					} else {
						$error = 'The file already exists.';
					}
				} else {
					$error = 'Wrong file type provided.';
				}
			} else {
				$error = 'The file is too big.';
			}
		} else {
			$error = 'Some error occured in uploading the file.';
		}
	} else {
		$error = 'No file is found to be uploaded.';
	}
	if ($error != "") {
		echo $error;
		exit;
	} else {
		return $returnstr;
	}
}

//==========================
//	File extension
//=====================
function fileextension($filename)
{
	$path_info = pathinfo($filename);
	return $path_info['extension'];
}
//===================
//	File name
//==================
function filename($filename)
{
	$path_info = pathinfo($filename);
	return $path_info['filename'];
}
//pagenation
function paginate($start, $limit, $total, $filePath, $otherParams)
{
	global $lang;

	if ($otherParams != '') {
		$otherParams = "&" . $otherParams;
	}

	$allPages = ceil($total / $limit);

	$currentPage = floor($start / $limit) + 1;

	$pagination = "";
	if ($allPages > 10) {
		$maxPages = ($allPages > 9) ? 9 : $allPages;

		if ($allPages > 9) {
			if ($currentPage >= 1 && $currentPage <= $allPages) {
				$pagination .= ($currentPage > 4) ? " ... " : " ";

				$minPages = ($currentPage > 4) ? $currentPage : 5;
				$maxPages = ($currentPage < $allPages - 4) ? $currentPage : $allPages - 4;

				for ($i = $minPages - 4; $i < $maxPages + 5; $i++) {
					$pagination .= ($i == $currentPage) ? "[" . $i . "] " : "<a href=\"" . $filePath . "?start=" . (($i - 1) * $limit) . $otherParams . "\">" . $i . "</a> ";
				}
				$pagination .= ($currentPage < $allPages - 4) ? " ... " : " ";
			} else {
				$pagination .= " ... ";
			}
		}
	} else {
		for ($i = 1; $i < $allPages + 1; $i++) {
			$pagination .= ($i == $currentPage) ? "[" . $i . "] " : "<a href=\"" . $filePath . "?start=" . (($i - 1) * $limit) . $otherParams . "\">" . $i . "</a> ";
		}
	}

	if ($currentPage > 1) $pagination = "[<a href=\"" . $filePath . "?start=0" . $otherParams . "\">&lt;&lt;</a>] [<a href=\"" . $filePath . "?start=" . (($currentPage - 2) * $limit) . $otherParams . "\">&lt;</a>] " . $pagination;
	if ($currentPage < $allPages) $pagination .= " [<a href=\"" . $filePath . "?start=" . ($currentPage * $limit) . $otherParams . "\">&gt;</a>] [<a href=\"" . $filePath . "?start=" . (($allPages - 1) * $limit) . $otherParams . "\">&gt;&gt;</a>]";

	echo $pagination;
}
function stripslashi_deep($value)
{
	$value = is_array($value) ?
		array_map('stripslashi_deep', $value) :
		stripslashes($value);

	return $value;
}
function func_date_conversion($date_format_source, $date_format_destiny, $date_str)
{
	/*
	To Convert Any Date Format to any other Date Format
	Use Like:
		$df_des = 'Y-m-d H:i';
		$df_src = 'd/m/Y H:i A';
		echo func_date_conversion( $df_src, $df_des, '10/11/2008 03:34 PM');
*/
	$base_format     = explode('[:/.\ \-]', $date_format_source);
	$date_str_parts = explode('[:/.\ \-]', $date_str);

	$date_elements = array();

	$p_keys = array_keys($base_format);
	foreach ($p_keys as $p_key) {
		if (!empty($date_str_parts[$p_key])) {
			$date_elements[$base_format[$p_key]] = $date_str_parts[$p_key];
		} else
			return false;
	}

	if (array_key_exists('M', $date_elements)) {
		$Mtom = array(
			"Jan" => "01",
			"Feb" => "02",
			"Mar" => "03",
			"Apr" => "04",
			"May" => "05",
			"Jun" => "06",
			"Jul" => "07",
			"Aug" => "08",
			"Sep" => "09",
			"Oct" => "10",
			"Nov" => "11",
			"Dec" => "12",
		);
		$date_elements['m'] = $Mtom[$date_elements['M']];
	}

	$dummy_ts = time($date_elements['H'], $date_elements['i'], $date_elements['s'], $date_elements['m'], $date_elements['d'], $date_elements['Y']);

	return date($date_format_destiny, $dummy_ts);
}
function RemoveDateFromFilename($filename, $separator = "_")
{
	$file_ext = fileextension($filename);
	$file_name = filename($filename);

	$exp_arr = explode($separator, $file_name);
	unset($exp_arr[count($exp_arr) - 1]);
	$org_file_name = implode($separator, $exp_arr);
	return $org_file_name . "." . $file_ext;
}
/***********************************************
 **	Used to force download any file by passing the full path of the file for download
 **	Use Like 
 **	echo ForceDownloadFile("documents/application.pdf");
 ************************************************/
function ForceDownloadFile($filepath)
{
	$extn = fileextension($filepath);
	$flnm = filename($filepath);
	$downloadfl = $flnm . "." . $extn;
	$downloadfl = RemoveDateFromFilename($downloadfl);
	$len = @filesize($filepath);
	header("Content-type: application/$extn");
	header("Content-Disposition: attachment; filename=$downloadfl");
	header("Content-Length: $len");
	@readfile($filepath);
	exit;
}
function exam_papercode($id)
{
	$exam = "SELECT paper_code FROM i_exambuilder WHERE exam_id=" . $id;
	$examcode = getarrayassoc($exam);
	return $examcode['paper_code'];
}

function getweekdays($sStartDate, $sEndDate, $allholidays)
{
	// This function works best with YYYY-MM-DD
	$aDays = array();
	$sStartDate = gmdate("Y-m-d", strtotime($sStartDate));
	$sEndDate = gmdate("Y-m-d", strtotime($sEndDate));
	$sweekday = gmdate("w", strtotime($sStartDate));
	if (is_array($allholidays)) {
		if (in_array($sweekday, $allholidays)) {
			$aDays[] = $sStartDate;
		}
	}
	$sCurrentDate = $sStartDate;
	while ($sCurrentDate < $sEndDate) {
		$sCurrentDate = gmdate("Y-m-d", strtotime("+1 day", strtotime($sCurrentDate)));
		$sweekday = gmdate("w", strtotime($sCurrentDate));
		if (is_array($allholidays)) {
			if (in_array($sweekday, $allholidays)) {
				$aDays[] = $sCurrentDate;
			}
		}
	}
	return $aDays;
}

function AmountFormat($amount = '0', $symbal = '')
{
	$amount = round($amount, 2);
	$sign = '';
	if (substr($amount, 0, 1) == '-') {
		$sign = '-';
		$amount = substr($amount, 1);
	}
	if ($symbal == " ") {		// If you want the format without any symbol then pass space, ie: " "
		$amount = $sign . number_format($amount, 2, '.', '');
	} else {
		$amount = $sign . $symbal . number_format($amount, 2);
	}
	return $amount;
}

function getage($birthdate, $lastyear)
{
	$dt1 = substr($birthdate, 0, 2);
	$mon1 = substr($birthdate, 3, 2);
	$yr1 = substr($birthdate, 6, 4);

	$date1 = $dt1 . '/' . $mon1 . '/' . $yr1;
	if ($lastyear == "") {
		$sys_date = date("d/m/Y");
	} else {
		$sys_date = $lastyear;
	}


	$dt2 = substr($sys_date, 0, 2);
	$mon2 = substr($sys_date, 3, 2);
	$yr2 = substr($sys_date, 6, 4);

	$date2 = $dt2 . '/' . $mon2 . '/' . $yr2;

	function smoothdate($year, $month, $day)
	{
		return sprintf('%04d', $year) . sprintf('%02d', $month) . sprintf('%02d', $day);
	}

	function date_difference($first, $second)
	{
		$month_lengths = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);

		$retval = FALSE;

		if (
			checkdate($first['month'], $first['day'], $first['year']) &&
			checkdate($second['month'], $second['day'], $second['year'])
		) {
			$start = smoothdate($first['year'], $first['month'], $first['day']);
			$target = smoothdate($second['year'], $second['month'], $second['day']);

			if ($start <= $target) {
				$add_year = 0;
				while (smoothdate($first['year'] + 1, $first['month'], $first['day']) <= $target) {
					$add_year++;
					$first['year']++;
				}

				$add_month = 0;
				while (smoothdate($first['year'], $first['month'] + 1, $first['day']) <= $target) {
					$add_month++;
					$first['month']++;

					if ($first['month'] > 12) {
						$first['year']++;
						$first['month'] = 1;
					}
				}

				$add_day = 0;
				while (smoothdate($first['year'], $first['month'], $first['day'] + 1) <= $target) {
					if (($first['year'] % 100 == 0) && ($first['year'] % 400 == 0)) {
						$month_lengths[1] = 29;
					} else {
						if ($first['year'] % 4 == 0) {
							$month_lengths[1] = 29;
						}
					}

					$add_day++;
					$first['day']++;
					if ($first['day'] > $month_lengths[$first['month'] - 1]) {
						$first['month']++;
						$first['day'] = 1;

						if ($first['month'] > 12) {
							$first['month'] = 1;
						}
					}
				}

				$retval = array('years' => $add_year, 'months' => $add_month, 'days' => $add_day);
			}
		}

		return $retval;
	}

	$begin = array('year' => $yr1, 'month' => $mon1, 'day' => $dt1);
	$end = array('year' => $yr2, 'month' => $mon2, 'day' => $dt2);
	$foo = date_difference($begin, $end);
	//array_print($foo);
	return $foo;
}

function getage123($birthdate)
{
	$dt1 = substr($birthdate, 0, 2);
	$mon1 = substr($birthdate, 3, 2);
	$yr1 = substr($birthdate, 6, 4);

	$date1 = $dt1 . '/' . $mon1 . '/' . $yr1;

	$sys_date = date("d/m/Y");

	$dt2 = substr($sys_date, 0, 2);
	$mon2 = substr($sys_date, 3, 2);
	$yr2 = substr($sys_date, 6, 4);

	$date2 = $dt2 . '/' . $mon2 . '/' . $yr2;
}

function showstaff($i_class, $perid)
{
	$staff_arr = array();
	$t1_staff_sql = "SELECT `i_staffid`,`st_firstname`,`st_lastname` FROM `i_staff` ST WHERE ST.teach_nonteach='teaching' AND ST.status='added' AND ST.selstatus='accepted' AND ST.tcstatus='notissued' AND ST.i_staffid NOT IN(SELECT " . $perid . " FROM i_timetable_staff TS WHERE TS.i_class!='" . $i_class . "' ) ";

	$rs_qury   = @mysqli_query($GLOBALS['db'], $t1_staff_sql);
	if (@mysqli_num_rows($rs_qury) > 0) {
		$staff_arr[] = "--Staff--";
		while ($data = @mysqli_fetch_assoc($rs_qury)) {

			$staff_arr[$data['i_staffid']] = strtolower($data['st_firstname']);
		}
		return $staff_arr;
	}
	return null;
}
function showsubjects($i_class)
{
	$staff_arr = array();


	$sel_subject = "(
SELECT `i_subjectname`,i_subjectid
FROM i_subject
WHERE `i_subjectshortname` =" . $i_class . "
)
UNION (

SELECT `subjectname`,ts_id
FROM i_timetable_subjects
WHERE classid =" . $i_class . "
)";
	//$sel_subject = "SELECT * FROM `i_subject` WHERE `i_subjectshortname` ='$sub_class'";


	$rs_qury   = @mysqli_query($GLOBALS['db'], $sel_subject);
	if (@mysqli_num_rows($rs_qury) > 0) {
		$subjects_arr[] = "--Subject--";
		while ($data = @mysqli_fetch_assoc($rs_qury)) {

			$subjects_arr[$data['i_subjectid']] = strtolower($data['i_subjectname']);
		}
		return $subjects_arr;
	}
	return null;
}
function checkHeads($head_num)
{
	$checkHead = "SELECT headquater_no from i_headquarter WHERE headquater_no = " . $head_num;
	$checksHead = mysqli_query($GLOBALS['db'], $checkHead);
	$roomname1 = mysqli_fetch_assoc($checksHead);
	return $roomname1;
}
function checkRoute($shl_head, $route_num)
{
	$checksroute = "SELECT headquarter_t_route,route_number from i_routelist WHERE headquarter_t_route=" . $shl_head . " AND route_number=" . $route_num;
	$chkroute = mysqli_query($GLOBALS['db'], $checksroute);
	$routenm = mysqli_fetch_assoc($chkroute);
	return $routenm;
}

function ieach(&$id)
{
	$GLOBALS['db'];
	$key = key($id);
	$result = ($key === NULL) ? false : [$key, current($id), 'key' => $key, 'value' => current($id)];
	next($id);
	return $result;
}


function gethostname11($id)
{
	$GLOBALS['db'];
	$host_det = getarrayassoc("SELECT host FROM com_colleges WHERE college_id=" . $id);
	return $host_det['host'];
}
function getusername11($id)
{
	$GLOBALS['db'];
	$host_det = getarrayassoc("SELECT username FROM com_colleges WHERE college_id=" . $id);
	return $host_det['username'];
}
function getpassword11($id)
{
	$GLOBALS['db'];
	$host_det = getarrayassoc("SELECT password FROM com_colleges WHERE college_id=" . $id);
	return $host_det['password'];
}
function getdata11($tble, $field, $whr)    // getdata
{
	//echo "SELECT $field FROM $tble where $whr ";
	$res = mysqli_query($GLOBALS['db'], "SELECT $field FROM $tble where $whr");
	$row = mysqli_fetch_assoc($res);
	return $row[0];
}

function getdatabase11($id)
{
	$GLOBALS['db'];
	$host_det = getarrayassoc("SELECT dbname FROM com_colleges WHERE college_id=" . $id);
	return $host_det['dbname'];
}
function getfoldername11($id)
{
	$GLOBALS['db'];
	$host_det = getarrayassoc("SELECT folder_name FROM com_colleges WHERE college_id=" . $id);
	return $host_det['folder_name'];
}
function stripslashes_deep($value)
{
	$value = is_array($value) ?
		array_map('stripslashes_deep', $value) :
		stripslashes($value);
	return $value;
}
function url_get_contents($Url)
{
	if (!function_exists('curl_init')) {
		die('CURL is not installed!');
	}
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $Url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$output = curl_exec($ch);
	curl_close($ch);
	return $output;
}

function case_name($id)
{
	return ucwords(strtolower($id));
}
if (!function_exists("str_contains")) {
	function str_contains(string $haystack, string $needls): bool
	{
		return '' === $needls || false !== strpos($haystack, $needls);
	}
}
function getToken($length)
{
    $token = "";
    $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
    $codeAlphabet.= "0123456789";
    $max = strlen($codeAlphabet); // edited

    for ($i=0; $i < $length; $i++) {
        $token .= $codeAlphabet[crypto_rand_secure(0, $max-1)];
    }
    return $token;
}
function crypto_rand_secure($min, $max)
{
    $range = $max - $min;
    if ($range < 1) return $min; // not so random...
    $log = ceil(log($range, 2));
    $bytes = (int) ($log / 8) + 1; // length in bytes
    $bits = (int) $log + 1; // length in bits
    $filter = (int) (1 << $bits) - 1; // set all lower bits to 1
    do {
        $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
        $rnd = $rnd & $filter; // discard irrelevant bits
    } while ($rnd > $range);
    return $min + $rnd;
}
