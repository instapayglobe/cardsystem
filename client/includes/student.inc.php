<?php
$result = getamultiassoc("SELECT `card_amount_id`, `card_amount` FROM `card_amounts` WHERE 1");
foreach ($result as $row) {
  $card_amounts .= '<option value="' . $row['card_amount_id'] . '">' . $row['card_amount'] . '</option>';
}
fetch_global("admission");
if ($action === 'addstudent')
{
  $sql = 'SELECT `sr`, `wallet_id`, `trans_id`, `status`, `cardNo`, (SELECT card_amount from card_amounts where card_amount_id = card_request.amount) as `amount`, `remark`, `requested_on` FROM card_request WHERE wallet_id = "'.$_SESSION['usercode'].'"';
  $viewCardsR = getamultiassoc($sql);
  if($admission === 'confirm') {
    fetch_global("amount", "nocard", "remark"  );
    $temp = getarrayassoc('SELECT `balance`, (Select card_amount from card_amounts where card_amount_id = "'.$amount.'") as cardAmount from wallet where wallet_id = "'.$_SESSION['usercode'].'"');
    $walletAmount = $temp['balance'];
      $upamount = $walletAmount - ($nocard*$temp['cardAmount']);
      //  print_r($upamount.$amount.$nocard); die();
    if($upamount>=0){
      $wsql = "UPDATE `wallet` SET `balance`= " . $upamount . " WHERE `wallet_id` = '" . $_SESSION['usercode'] . "'";
   $tsql= 'INSERT INTO `tr_sts`(`user_id`, `amount`, `remark`,`trasaction_id`) VALUES ("' . $_SESSION['usercode'] . '","'. ($nocard*$temp['cardAmount']).'","CARD PURCHASING","'.getToken(10).'" )';
    $sql = 'INSERT INTO `card_request`( `wallet_id`, `trans_id`, `cardNo`, `amount`, `wallet_amount`, `remark`) VALUES
                                      ( "'.$_SESSION['usercode'].'", "'.getToken(10).'" , "'.$nocard.'", "'.$amount.'", "'.$upamount.'", "'.$remark.'")';
  
    if (runQuery($sql)&&runQuery($wsql)&&runQuery($tsql))
      header('location: ?pid=1&action=addstudent&msg=4');
      exit;
  }
  else
  {
    $msg=5;
  }
  }
}
if ($action === 'editStudent' && $admission === 'confirm') {
  fetch_global("s_photo", "si_photo", "q_photo", "a_photo", "courseid", "coursedur", "name", "id", "fname", "mname", "aadhaar", "dob", "atype", "email", "phone", "aphone", "address", "city", "state", "district", "pincode", "nationality", "language", "qualification", "courseName", "a_date", "e_date", "student_photo", "student_signature", "student_qualification", "student_address");
  if (!file_exists($_FILES['student_photo']['tmp_name']) || !is_uploaded_file($_FILES['student_photo']['tmp_name'])) {
    $student_photo = $s_photo;
  } else {
    $student_photo = uploadanyfile('student_photo', $path = "students/", $newname = true, $type = "image", $max_size = "1073741824");
  }

  if (!file_exists($_FILES['student_signature']['tmp_name']) || !is_uploaded_file($_FILES['student_signature']['tmp_name'])) {
    $student_signature = $si_photo;
  } else {
    $student_signature = uploadanyfile('student_signature', $path = "students/", $newname = true, $type = "image", $max_size = "1073741824");
  }

  if (!file_exists($_FILES['student_qualification']['tmp_name']) || !is_uploaded_file($_FILES['student_qualification']['tmp_name'])) {
    $student_qualification = $q_photo;
  } else {
    $student_qualification = uploadanyfile('student_qualification', $path = "students/", $newname = true, $type = "image", $max_size = "1073741824");
  }
  if (!file_exists($_FILES['student_address']['tmp_name']) || !is_uploaded_file($_FILES['student_address']['tmp_name'])) {
    $student_address = $a_photo;
  } else {
    $student_address = uploadanyfile('student_address', $path = "students/", $newname = true, $type = "image", $max_size = "1073741824");
  }
  $sql = "UPDATE `student_details` SET `course`='$courseName',`course_id`='$courseid',`course_dur`='$coursedur',`name`='$name', `father_name`='$fname', `mother_name`='$mname', `adhaar`='$aadhaar', `atype`='$atype', `email`='$email', `contact`='$phone', `aphone`='$aphone', `address`='$address', `dob`='$dob', `qualification`='$qualification', `village`='$city', `distt`='$district',`pincode`='$pincode',`nationality`='$nationality',`language`='$language', `state`='$state', `adate`='$a_date', `edate`='$e_date', `student_photo`='$student_photo', `adhaar_photo`='$student_address', `signature_photo`='$student_signature', `qualification_photo`='$student_qualification' WHERE `sid` = '$id'";
  if (runQuery($sql))
    header('location: ?pid=1&action=viewstudent&msg=2');
    exit;
}

