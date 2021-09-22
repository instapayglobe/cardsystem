<?php
fetch_global('admission', 'id', 'pay_now', 'msg');
// $result = getamultiassoc("SELECT `c_code`, `c_name`, `c_dur`, `c_fees` FROM `course_name` WHERE 1");
// foreach ($result as $row) {
//   $course_options .= '<option fees=' . $row['c_fees'] . ' course_name="' . $row['c_name'] . '" duration= "' . $row['c_dur'] . '" value="' . $row['c_code'] . '">' . case_name($row['c_name']) . '</option>';
// }
if ($action === 'viewstudent' || $action === 'editstudent') {
  $sqlSelect = "SELECT `sid`,`status`,`course`,`course_id`, `name`, `father_name`, `mother_name`, `adhaar`, `email`, `contact`, `address`, `dob`, `qualification`, `village`, `distt`, `state`, `adate`, `edate`, `student_photo`,`entry_date` FROM `student_details` WHERE `sponsor` = '" . $_SESSION['usercode'] . "' AND `status` = 0";
  $viewStudent = getamultiassoc($sqlSelect);
}
if ($action === 'viewpassbook') {
  $sql1=array(); $sql2 =array();
  $sql1 = getamultiassoc("SELECT  `tr`.`amount` as tramount, `tr`.`remark` as tremark, `tr`.`user_id`, `tr`.`tr_date`,`tr`.`trasaction_id` FROM `tr_sts` `tr` where `tr`.`user_id` =  '" . $_SESSION['usercode'] . "' ORDER BY `tr`.`tr_date` DESC ");
  $sql2 = getamultiassoc("SELECT  `fr`.`amount`, `fr`.`trans_id`, `fr`.`status`,  `fr`.`remark`, `fr`.`requested_date` FROM `fund_request` `fr` WHERE`fr`.`user` = '" . $_SESSION['usercode'] . "' AND `status` = 1 ORDER BY `fr`.`requested_date` DESC ");
  // print_r($sql2); die('ended');    
  if(is_array($sql1)&&is_array($sql2))
  $viewPassbook = array_merge($sql1, $sql2);
  else
  $viewPassbook =array();
}
if ($action === 'editStudent') {
  $sqlSelect = "SELECT * FROM `student_details` WHERE `sid` = '" . $id . "'";
  $editStudent = getarrayassoc($sqlSelect);
}
if ($action === 'paystudent') {
  $sqlSelect = "SELECT `c`.`c_dur`, `c`.`c_fees`, `sid`,`sponsor`,`status`,`course`,`course_id`, `name`, `father_name`, `mother_name`, `adhaar`, `email`, `contact`, `address`, `dob`, `qualification`, `village`, `distt`, `state`, `adate`, `edate`, `student_photo`,`entry_date` FROM `course_name` `c`, `student_details`  WHERE `sid` = '" . $id . "' AND `status` = 0 AND `c`.`c_code` = `course_id` ";
  $feeStudent = getarrayassoc($sqlSelect);

  if ($action === 'paystudent' && $pay_now === 'paying') {
    fetch_global('tr_password', 'remark');
    $cid = $feeStudent['sponsor'];
    $sql = "SELECT  `balance`, `wall_password` FROM `wallet` WHERE `wallet_id` = '" . $cid . "'";
    $wallet = getarrayassoc($sql);
    if ($tr_password === $wallet['wall_password']) {
      $bal = $wallet['balance'];
      $amount =  $feeStudent['c_fees'];
      $bal -= $amount;
      if ($bal >= 0) {
        $sql = "UPDATE `wallet` SET `balance`='" . $bal . "' WHERE `wallet_id`= '" . $cid . "';";
        $sql .= "UPDATE `student_details` SET `status`= 1 WHERE `sid`= '" . $id . "';";
        $sql .= "INSERT INTO `tr_sts`( `user_id`, `amount`, `remark`, `user_id`) VALUES ('" . $cid . "','" . $amount . "','" . $remark . "','" . $id . "');";
        if (runmQuery($sql))
          $msg=4;
      } else {
        $error = 'insufficient Fund in Your Wallet';
        $msg = 6;
      }
    } else {
      $error = 'Incorrect Password';
      $msg = 6;
    }
  }
}
