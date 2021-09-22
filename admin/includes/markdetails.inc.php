<?php
$result = getamultiassoc("SELECT `fid`, `cname` FROM `franchisee` WHERE 1");
fetch_global('addmarks', 'enroll', 'id', 'upload_marks', 'center');
foreach ($result as $row) {
  if ($row['fid'] === $center) {
    $fr_options .= '<option selected value="' . $row['fid'] . '">' . case_name($row['cname']) . ' (' . $row['fid'] . ')</option>';
  } else
    $fr_options .= '<option  value="' . $row['fid'] . '">' . case_name($row['cname']) . ' (' . $row['fid'] . ')</option>';
}
if (($action === 'addmarks' || $action === 'updatemarks' || $action === 'viewmarks') && $addmarks === 'confirm') {
  $condtion = "";
  fetch_global("center", "dof", "dot", "cid", "fname", "mname", "aadhaar", "dob", "email", "phone", "aphone", "address", "city", "state", "district", "pincode", "nationality", "language", "qualification", "courseName", "a_date", "e_date");
  if (!empty($dof) && !empty($dot)) {
    $condtion = "AND `adate` BETWEEN '" . $dof . "' AND '" . $dot . "'";
  }
  $sqlSelect = "SELECT `sd`.`sid`,`sd`.`status`,`sd`.`course`,`sd`.`course_id`, `sd`.`name`, `sd`.`father_name`, `sd`.`mother_name`, `sd`.`adhaar`, `sd`.`email`, `sd`.`contact`, `sd`.`dob`, `sd`.`qualification`, `sd`.`village`, `sd`.`distt`, `sd`.`state`, `sd`.`adate`, `sd`.`edate`, `sd`.`student_photo`,`sd`.`entry_date`  FROM `student_details` `sd`  WHERE `sd`.`sponsor` = '" . $center . "'" . $condtion . " GROUP BY `sd`.`sid`";
  $viewStudent = getamultiassoc($sqlSelect);
}
if (($action === 'addmarks' || $action === 'updatemarks' || $action === 'viewmarks') && $enroll == 'entermarks') {
  $sql = 'SELECT `sid` from `marks_details` WHERE `sid` = "' . $id . '"';
  if (sqlnumber($sql) <= 0) {
    $sqlSelect = "SELECT `sd`.`sid` ,`sd`.`sponsor`,`sd`.`status`,`sd`.`course`,`sd`.`course_id`, `sd`.`name`, `sd`.`father_name`, `sd`.`mother_name`, `sd`.`adhaar`, `sd`.`email`, `sd`.`contact`, `sd`.`dob`, `sd`.`qualification`, `sd`.`village`, `sd`.`distt`, `sd`.`state`, `sd`.`adate`, `sd`.`edate`, `sd`.`student_photo`,`sd`.`entry_date` , `sbd`.`c_code`, `sbd`.`sub_number`, `sbd`.`sub_code`, `sbd`.`sub_name` FROM `student_details` `sd`, `sub_name` `sbd`  WHERE `sd`.`sid` = '" . $id . "' AND `sd`.`course_id` = `sbd`.`c_code` ";
    $subdetails = getamultiassoc($sqlSelect);
  }
  if ($action === 'updatemarks' || $action === 'viewmarks') {
    $sqlSelect = "SELECT `sd`.`sid` ,`sd`.`sponsor`,`sd`.`status`,`sd`.`course`,`sd`.`course_id`, `sd`.`name`, `sd`.`father_name`, `sd`.`mother_name`, `sd`.`adhaar`, `sd`.`email`, `sd`.`contact`, `sd`.`dob`, `sd`.`qualification`, `sd`.`village`, `sd`.`distt`, `sd`.`state`, `sd`.`adate`, `sd`.`edate`, `sd`.`student_photo`,`sd`.`entry_date` , `sbd`.`c_code`, `sbd`.`sub_number`, `sbd`.`sub_code`, `sbd`.`sub_name` FROM `student_details` `sd`, `sub_name` `sbd`  WHERE `sd`.`sid` = '" . $id . "' AND `sd`.`course_id` = `sbd`.`c_code` ";
    $subdetails = getamultiassoc($sqlSelect);
  }
  if ($upload_marks === "Upload Marks") {
    fetch_global('course_id', 'subject_no', '');
    $tmark = 0;
    for ($i = 0; $i < $subject_no; $i++) {
      $param_sub[$i] = $_POST['sub' . $i];
      $tmark += $param_sub[$i];
    }
    $param_total_mark = $subject_no * 100;
    $param_ob_mark = $tmark;
    $per = ($param_ob_mark / $param_total_mark) * 100;
    $param_percent = $per;
    if ($param_percent >= 80) {
      $param_grade = "A+";
    } else if (($param_percent >= 60) && ($param_percent < 80)) {
      $param_grade = "A";
    } else if (($param_percent >= 50) && ($param_percent < 60)) {
      $param_grade = "B";
    } else {
      $param_grade = "C";
    }
    for ($i = $subject_no; $i < 19; $i++)
      $param_sub[$i] = 0;
    if ($action === 'addmarks') {
      $sql = "INSERT INTO `marks_details`(`sid`, `status`, `course_id`, `no_sub`, `total_mark`, `ob_mark`, `percent`, `grade`, `sub0`, `sub1`, `sub2`, `sub3`, `sub4`, `sub5`, `sub6`, `sub7`, `sub8`, `sub9`, `sub10`, `sub11`, `sub12`, `sub13`, `sub14`, `sub15`, `sub16`, `sub17`, `sub18`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
      $record1 = modifyRecord($sql, "sisiiiisiiiiiiiiiiiiiiiiiii", [$id, 1, $course_id, $subject_no, $param_total_mark, $param_ob_mark, $param_percent, $param_grade, $param_sub[0], $param_sub[1], $param_sub[2], $param_sub[3], $param_sub[4], $param_sub[5], $param_sub[6], $param_sub[7], $param_sub[8], $param_sub[9], $param_sub[10], $param_sub[11], $param_sub[12], $param_sub[13], $param_sub[14], $param_sub[15], $param_sub[16], $param_sub[17], $param_sub[18]]);
    } else if ($action === 'updatemarks') {
      $sql = "UPDATE `marks_details` SET `status`=?,`course_id`=?,`no_sub`=?,`total_mark`=?, `ob_mark`=?, `percent`=?, `grade`=?,`sub0`=?,`sub1`=?,`sub2`=?,`sub3`=?,`sub4`=?,`sub5`=?,`sub6`=?,`sub7`=?,`sub8`=?,`sub9`=?,`sub10`=?,`sub11`=?,`sub12`=?,`sub13`=?,`sub14`=?,`sub15`=?,`sub16`=?,`sub17`=?,`sub18`=? WhERE `sid`=? ";
      $record1 = modifyRecord($sql, "isiiiisiiiiiiiiiiiiiiiiiiis", [1, $course_id, $subject_no, $param_total_mark, $param_ob_mark, $param_percent, $param_grade, $param_sub[0], $param_sub[1], $param_sub[2], $param_sub[3], $param_sub[4], $param_sub[5], $param_sub[6], $param_sub[7], $param_sub[8], $param_sub[9], $param_sub[10], $param_sub[11], $param_sub[12], $param_sub[13], $param_sub[14], $param_sub[15], $param_sub[16], $param_sub[17], $param_sub[18], $id]);
    }
    for ($i = 0; $i < $subject_no; $i++)
      $param_sub[$i] = $_POST['psub' . $i];
    for ($i = $subject_no; $i < 19; $i++)
      $param_sub[$i] = 0;
    if ($action === 'addmarks') {
      $sql = "INSERT INTO `practical_details` ( `sid`, `status`, `course_id`, `no_sub`, `sub0`, `sub1`, `sub2`, `sub3`, `sub4`, `sub5`, `sub6`, `sub7`, `sub8`, `sub9`, `sub10`, `sub11`, `sub12`, `sub13`, `sub14`, `sub15`, `sub16`, `sub17`, `sub18`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
      $record2 = modifyRecord($sql, "sisiiiiiiiiiiiiiiiiiiii", [$id, 1, $course_id, $subject_no, $param_sub[0], $param_sub[1], $param_sub[2], $param_sub[3], $param_sub[4], $param_sub[5], $param_sub[6], $param_sub[7], $param_sub[8], $param_sub[9], $param_sub[10], $param_sub[11], $param_sub[12], $param_sub[13], $param_sub[14], $param_sub[15], $param_sub[16], $param_sub[17], $param_sub[18]]);
    } else if ($action === 'updatemarks') {
      $sql = "UPDATE `practical_details` SET `status`=?,`course_id`=?,`no_sub`=?,`sub0`=?,`sub1`=?,`sub2`=?,`sub3`=?,`sub4`=?,`sub5`=?,`sub6`=?,`sub7`=?,`sub8`=?,`sub9`=?,`sub10`=?,`sub11`=?,`sub12`=?,`sub13`=?,`sub14`=?,`sub15`=?,`sub16`=?,`sub17`=?,`sub18`=? WhERE `sid`=? ";
      $record2 = modifyRecord($sql, "isiiiiiiiiiiiiiiiiiiiis", [1, $course_id, $subject_no, $param_sub[0], $param_sub[1], $param_sub[2], $param_sub[3], $param_sub[4], $param_sub[5], $param_sub[6], $param_sub[7], $param_sub[8], $param_sub[9], $param_sub[10], $param_sub[11], $param_sub[12], $param_sub[13], $param_sub[14], $param_sub[15], $param_sub[16], $param_sub[17], $param_sub[18], $id]);
    }
    for ($i = 0; $i < $subject_no; $i++)
      $param_sub[$i] = $_POST['tsub' . $i];
    for ($i = $subject_no; $i < 19; $i++)
      $param_sub[$i] = 0;
    if ($action === 'addmarks') {
      $sql = "INSERT INTO `theory_details`( `sid`, `status`, `course_id`, `no_sub`, `sub0`, `sub1`, `sub2`, `sub3`, `sub4`, `sub5`, `sub6`, `sub7`, `sub8`, `sub9`, `sub10`, `sub11`, `sub12`, `sub13`, `sub14`, `sub15`, `sub16`, `sub17`, `sub18`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
      $record3 = modifyRecord($sql, "sisiiiiiiiiiiiiiiiiiiii", [$id, 1, $course_id, $subject_no, $param_sub[0], $param_sub[1], $param_sub[2], $param_sub[3], $param_sub[4], $param_sub[5], $param_sub[6], $param_sub[7], $param_sub[8], $param_sub[9], $param_sub[10], $param_sub[11], $param_sub[12], $param_sub[13], $param_sub[14], $param_sub[15], $param_sub[16], $param_sub[17], $param_sub[18]]);
    } else if ($action === 'updatemarks') {
      $sql = "UPDATE `theory_details` SET `status`=?,`course_id`=?,`no_sub`=?,`sub0`=?,`sub1`=?,`sub2`=?,`sub3`=?,`sub4`=?,`sub5`=?,`sub6`=?,`sub7`=?,`sub8`=?,`sub9`=?,`sub10`=?,`sub11`=?,`sub12`=?,`sub13`=?,`sub14`=?,`sub15`=?,`sub16`=?,`sub17`=?,`sub18`=? WhERE `sid`=? ";
      $record3 = modifyRecord($sql, "isiiiiiiiiiiiiiiiiiiiis", [1, $course_id, $subject_no, $param_sub[0], $param_sub[1], $param_sub[2], $param_sub[3], $param_sub[4], $param_sub[5], $param_sub[6], $param_sub[7], $param_sub[8], $param_sub[9], $param_sub[10], $param_sub[11], $param_sub[12], $param_sub[13], $param_sub[14], $param_sub[15], $param_sub[16], $param_sub[17], $param_sub[18], $id]);
    }
    if ($record1 && $record2 && $record3) {
      header("location: ?pid=1&action=addmarks&msg=2");
      exit();
    }
  }
}
if ($action == 'updatemarks' || $action == 'viewmarks') { 
  $marks_sql = 'SELECT * from `marks_details` WHERE `sid` = "' . $id . '"';
  if (sqlnumber($marks_sql) > 0) {
    $marksdetails = getarrayassoc($marks_sql);
    $pmarks_sql = 'SELECT * from `practical_details` WHERE `sid` = "' . $id . '"';
    $pdetails = getarrayassoc($pmarks_sql);
    $tmarks_sql = 'SELECT * from `theory_details` WHERE `sid` = "' . $id . '"';
    $tdetails = getarrayassoc($tmarks_sql);
  }
}
if ($action === 'viewstudent' || $action === 'editstudent') {
  $sqlSelect = "SELECT `sid`,`status`,`course`,`course_id`, `name`, `father_name`, `mother_name`, `adhaar`, `email`, `contact`, `address`, `dob`, `qualification`, `village`, `distt`, `state`, `adate`, `edate`, `student_photo`,`entry_date` FROM `student_details` WHERE `sponsor` = '" . $_SESSION['usercode'] . "'";
  $viewStudent = getamultiassoc($sqlSelect);
}
if ($action === 'editStudent') {
  fetch_global('id');
  $sqlSelect = "SELECT * FROM `student_details` WHERE `sid` = '" . $id . "'";
  $editStudent = getarrayassoc($sqlSelect);
}
