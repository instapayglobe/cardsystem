<?php
$result = getamultiassoc("SELECT `cid`, `name` FROM `client_details` WHERE 1");
fetch_global('addmarks', 'enroll', 'id', 'upload_marks', 'permissions', 'client');
foreach ($result as $row) {
  if ($row['cid'] === $client) {
    $fr_options .= '<option selected value="' . $row['cid'] . '">' . case_name($row['name']) . ' (' . $row['cid'] . ')</option>';
  } else $fr_options .= '<option value="' . $row['cid'] . '">' . case_name($row['name']) . ' (' . $row['cid'] . ')</option>';
}
if ($action === 'viewclient' || $action === 'approveclient') {
  if ($action === 'approveclient') {
    $sqlSelect = "SELECT * FROM `client_details`  WHERE `status` = 1 ORDER BY `entry_date` DESC ";
  } else if ($action === 'viewclient') {
    $sqlSelect = "SELECT * FROM `client_details`  WHERE `status` = 1 ORDER BY `entry_date` DESC ";
  }
  $viewClient = getamultiassoc($sqlSelect);
  if ($id != "") {
    $sqlSelect = "UPDATE `franchisee` SET `status` = 1 WHERE `fid` =  '" . $id . "'";
    $sqlSelect2 = "INSERT INTO wallet (`wallet_id`,`balance`,`wall_password`) VALUES ( '" . $id . "',0," . rand(1111, 99999) . ")";
    echo $sqlSelect;
    if (runQuery($sqlSelect) && runQuery($sqlSelect2)) {
      header("location: ?pid=2&action=viewclient&msg=2");
      exit();
    }
  }
}

if ($action === 'assignpermission') {
  fetch_global('client');
  $per_array = array('');
  if ($client != '') {
    $sql = 'SELECT `permissions` FROM `franchisee` WHERE  `fid`="' . $client . '"';
    $per = implode(" ", getarrayassoc($sql));
    $per_array = explode(',', $per);
  }
  if ($permissions === 'assigning') {
    fetch_global('addstudent', 'viewstudent', 'editstudent', 'payfee', 'viewpassbook', 'createissue', 'addmoney', 'viewwallet', 'inline', 'addmission', 'identitycard', 'syllabus');
    $per = $addstudent . ',' . $viewstudent . ',' . $editstudent . ',' . $payfee . ',' . $viewpassbook . ',' . $createissue . ',' . $addmoney . ',' . $viewwallet . ',' . $inline . ',' . $addmission . ',' . $identitycard . ',' . $syllabus;
    //array_print(explode(',',$per));
    $sql = 'UPDATE `franchisee` SET `permissions`= "' . $per . '" WHERE `fid`="' . $client . '"';
    $msg = runQuery($sql) ? 11 : 5;
  }
}
if (($action === "editclient") && ($id !== "")) :
  $sql = 'SELECT * FROM `franchisee` WHERE  `fid`="' . $id . '"';
  $editClient = getarrayassoc($sql);

  if ($upload_marks === 'confirm') {
    fetch_global(
      'name',
      'fname',
      'mname',
      'address',
      'pin_code',
      'city',
      'district',
      'state',
      'email',
      'mobile',
      'aadhaar',
      'c_name',
      'c_address',
      'c_land_mark',
      'c_city',
      'c_district',
      'c_state',
      'c_email',
      'c_mobile',
      'c_pin_code',
      "hphoto",
      "h_photo",
      "in_photo",
      "inphoto",
      "ex_photo",
      "exphoto"
    );
    if (!file_exists($_FILES['hphoto']['tmp_name']) || !is_uploaded_file($_FILES['hphoto']['tmp_name'])) {
      $hphoto = $h_photo;
    } else {
      $hphoto = uploadanyfile('hphoto', $path = "../home/f_images/", $newname = true, $type = "image", $max_size = "1073741824");
    }

    if (!file_exists($_FILES['inphoto']['tmp_name']) || !is_uploaded_file($_FILES['inphoto']['tmp_name'])) {
      $inphoto = $in_photo;
    } else {
      $inphoto = uploadanyfile('inphoto', $path = "../home/f_images/", $newname = true, $type = "image", $max_size = "1073741824");
    }

    if (!file_exists($_FILES['exphoto']['tmp_name']) || !is_uploaded_file($_FILES['exphoto']['tmp_name'])) {
      $exphoto = $ex_photo;
    } else {
      $exphoto = uploadanyfile('exphoto', $path = "../home/f_images/", $newname = true, $type = "image", $max_size = "1073741824");
    }

    $sql = "UPDATE `franchisee` SET `name`='$name',`fname`='$fname',`mname`='$mname',`address`='$address',`pin`='$pin_code',`city`='$city',`district`='$district',`state`='$state',`email`='$email',`mobile`='$mobile',`adhar`='$aadhaar',`cname`='$c_name',`caddress`='$c_address',`landmark`='$c_land_mark',`ccity`='$c_city',`cdistrict`='$c_district',`cstate`='$c_state',`cemail`='$c_email',`cmobile`='$c_mobile',`cpin`='$c_pin_code',`hphoto`='$hphoto',`inphoto`='$inphoto',`exphoto`='$exphoto' WHERE `fid` = '$id'";
    if (runQuery($sql))
      header("location: ?pid=2&action=viewclient&msg=2");
    exit();
  }
endif;