<?php
$arrContextOptions = array(
  "ssl" => array(
    "verify_peer" => false,
    "verify_peer_name" => false,
  ),
);
$api_link = WEBSITE . dirname($_SERVER['PHP_SELF']);
$file_name = "";
fetch_global('sync', 'download', 'enroll', 'id', 'upload_marks', 'student_id');
$viewAffliationn = $result = getamultiassoc("SELECT * FROM `franchisee` WHERE 1");
foreach ($result as $row) {
  $fr_options .= '<option  value="' . $row['fid'] . '">' . case_name($row['cname']) . ' (' . $row['fid'] . ')</option>';
}
if (($action === 'certificate' || $action === 'marksheet') && $download === 'confirm') {
  $condtion = "";
  fetch_global("center", "dof", "dot");
  if (!empty($dof) && !empty($dot)) {
    $condtion = "AND `adate` BETWEEN '" . $dof . "' AND '" . $dot . "'";
  }
  $sqlSelect = "SELECT `sd`.`sid`,`sd`.`status`,`sd`.`course`,`sd`.`course_id`, `sd`.`name`, `sd`.`father_name`, `sd`.`mother_name`, `sd`.`adhaar`, `sd`.`email`, `sd`.`contact`, `sd`.`dob`, `sd`.`qualification`, `sd`.`village`, `sd`.`distt`, `sd`.`state`, `sd`.`adate`, `sd`.`edate`, `sd`.`student_photo`,`sd`.`entry_date`  FROM `student_details` `sd`  WHERE `sd`.`sponsor` = '" . $center . "' AND `status` = 1 " . $condtion . " GROUP BY `sd`.`sid`";
  $viewStudent = getamultiassoc($sqlSelect);
}

if ($sync === 'marksheet') {
  $course = "";
  $i = 0;
  $file_no = 2;
  $student = $student_id;
  $temp = getarrayassoc("SELECT `course_dur` FROM `student_details` where `sid` = '" . $student . "'");
  $course_type = $temp["course_dur"];
  if ($course_type === "2 Year") {
    $loop_print = 2;
  } else if ($course_type === "3 Year") {
    $loop_print = 3;
  } else {
    $loop_print = 1;
  }

  $sqlSelect = "SELECT `sd`.`sr`, `sd`.`sponsor`, `sd`.`sid`, `sd`.`dob`, `sd`.`course`, `sd`.`course_id`, `sd`.`course_dur`, `sd`.`name`,  `sd`.`father_name`,  `sd`.`mother_name`, `sd`.`adate`, `sd`.`edate`, `fr`.`cname`, `fr`.`caddress`, `fr`.`cdistrict`, `fr`.`cstate`,(SELECT `grade` From `marks_details` WHERE `sid` = '" . $student . "') as `grade`  FROM `student_details` `sd`, `franchisee` `fr` WHERE `sid` = '" . $student . "' && `fr`.`fid` = `sd`.`sponsor` ";
  $row = getarrayassoc($sqlSelect);

  $course = $row['course_id'];
  $file_name = trim($row['name']) . trim($row['sid']);
  $sid = $row['sponsor'];
  $api_link .= '/documents/marksheet_api.php?sr=' . urlencode(trim($row['sr'])) . '&course_id_code=' . urlencode($row['course_id']) . '&dob=' . urlencode(trim($row['dob'])) . '&enroll=' . urlencode(trim($row['sid'])) . '&cid=' . urlencode(trim($row['sponsor'])) . '&course=' . urlencode(trim($row['course'])) . '&course_d=' . urlencode($row['course_dur']) . '&name=' . urlencode(trim($row['name'])) . '&fname=' . urlencode(trim($row['father_name'])) . '&mname=' . urlencode(trim($row['mother_name'])) . '&adate=' . urlencode(trim($row['adate'])) . '&edate=' . urlencode(trim($row['edate'])) . '&cname=' . urlencode(trim($row['cname'])) . '&caddress=' . urlencode(trim($row['caddress'])) . '&ccity=' . urlencode(trim($row['cdistrict'])) . '&cstate=' . urlencode(trim($row['cstate'])) . '&grade=' . urlencode(trim($row['grade']));
  //makes a request to our pdf generator api for each participant

  $sqlquery = "SELECT `sub_name`, `sub_number` FROM `sub_name` WHERE `c_code`='" . $course . "'";
  $sqlresult = getamultiassoc($sqlquery);
  if (is_array($sqlresult))
    foreach ($sqlresult as $sqlrow) {
      $api_link .= '&sub_code' . $i . '=' . urlencode($sqlrow['sub_name']);
      $x = $sqlrow['sub_number'];
      $i++;
    }
  $api_link .= '&sub_no=' . urlencode(trim($x));
  $sqlSelect = "SELECT * FROM `marks_details` WHERE `sid` = '" . $student . "'";
  $marks = getarrayassoc($sqlSelect);
  $sqlSelect = "SELECT  * FROM `theory_details` WHERE `sid` = '" . $student . "'";
  $theory = getarrayassoc($sqlSelect);
  $sqlSelect = "SELECT  * FROM `practical_details` WHERE `sid` = '" . $student . "'";
  $practical = getarrayassoc($sqlSelect);
  if (count($marks) > 0 && count($theory) > 0 && count($practical) > 0) {
    for ($i = 0; $i < $theory['no_sub']; $i++) {
      $api_link .= '&sub' . $i . '=' . urlencode(trim($marks['sub' . $i . ''])) . '&tsub' . $i . '=' . urlencode(trim($theory['sub' . $i . ''])) . '&psub' . $i . '=' . urlencode(trim($practical['sub' . $i . '']));
    }

    //echo $api_link;
    for ($x = 0; $x < $loop_print; $x++) {
      $api_link .= '&file_no=' . urlencode($x);
      url_get_contents($api_link);
      // $response = file_get_contents($api_link, false, stream_context_create($arrContextOptions));

    }
    $file_name = str_replace(' ', '', $file_name);
    for ($i = 0; $i < $loop_print; $i++)
      echo '<script type="text/javascript" language="Javascript">window.open("./documents/pdfs/' . $file_name . $i . '.pdf","'. ($i==0 ? "_self" :"_blank").'");</script>';
    //header('location: /../documents/pdfs/'.$file_name.$i.'.pdf'); //redirects to the zip file to be downloaded
    exit();
  } else {
    $msg = 6;
    $error = "No Marks Added";
  }
  $api_link = '';
  //makes a request to our pdf generator api for each participant
  //echo $api_link;
  // $rootPath = realpath($file_name);
  // $zip = new ZipArchive();
  // $zip->open(''.$file_name.'.zip', ZipArchive::CREATE | ZipArchive::OVERWRITE);

  // $files = new RecursiveIteratorIterator(
  //     new RecursiveDirectoryIterator($rootPath),
  //     RecursiveIteratorIterator::LEAVES_ONLY
  // );

  // foreach ($files as $name => $file)
  // {
  //     if (!$file->isDir())
  //     {
  //         $filePath = $file->getRealPath();
  //         $relativePath = substr($filePath, strlen($rootPath) + 1);
  //         $zip->addFile($filePath, $relativePath);
  //     }
  // }

  // $zip->close();

  //Adds the pdfs to a zip file

} else if ($sync == 'certificate') {
  $sqlSelect = "SELECT `std`.`sr`, `std`.`sponsor`, `std`.`sid`, `std`.`course`,`std`.`course_id`,`std`.`course_dur`, `std`.`name`, `std`.`father_name`, `std`.`mother_name`, `std`.`contact`, `std`.`dob`,`std`.`qualification`, `std`.`adate`, `std`.`edate`, `std`.`student_photo`, `std`.`signature_photo`, `ctr`.`cname`, `ctr`.`fid`, `mkd`.`total_mark`, `mkd`.`ob_mark`, `mkd`.`percent`, `mkd`.`grade`  FROM `student_details` `std`, `franchisee` `ctr`,`marks_details` `mkd` WHERE `std`.`sid` = '" . $student_id . "' AND `ctr`.`fid`=`std`.`sponsor` AND  `mkd`.`sid` = '" . $student_id . "'";
  $row = getarrayassoc($sqlSelect);
  $file_name = trim($row['name']) . trim($row['sid']);
  $api_link .= '/documents/certi_api.php?sr=' . urlencode(trim($row['sr'])) . '&course_id_code=' . urlencode($row['course_id']) . '&course_d=' . urlencode($row['course_dur']) . '&enroll=' . urlencode(trim($row['sid'])) . '&course=' . urlencode(trim($row['course'])) . '&name=' . urlencode(trim($row['name'])) . '&fname=' . urlencode($row['father_name']) . '&mname=' . urlencode($row['mother_name']) . '&contact=' . urlencode($row['contact']) . '&dob=' . urlencode(trim($row['dob'])) . '&qualification=' . urlencode(trim($row['qualification'])) . '&adate=' . urlencode(trim($row['adate'])) . '&edate=' . urlencode(trim($row['edate'])) . '&image=' . urlencode($row["student_photo"]) . '&signature=' . urlencode($row['signature_photo']) . '&cname=' . urlencode(trim($row['cname'])) . '&id=' . urlencode(trim($row['fid'])) . '&total_mark=' . urlencode(trim($row['total_mark'])) . '&ob_mark=' . urlencode(trim($row['ob_mark'])) . '&grade=' . urlencode(trim($row['grade']));
  //print_r($api_link);
  //die();
  url_get_contents($api_link);
  // $response = file_get_contents($api_link, false, stream_context_create($arrContextOptions));
  $file_name = str_replace(' ', '', $file_name);
  echo '<script type="text/javascript" language="Javascript">window.open("./documents/pdfs/' . $file_name . '.pdf","_self");</script>';
  //header('location: /../documents/pdfs/'.$file_name.'.pdf'); //redirects to the zip file to be downloaded
  exit();
} else if ($sync == 'letter') {
  $center = trim($_POST['franchisee']);
  $sqlSelect = "SELECT *  FROM `franchisee` WHERE `fid` = '" . $center . "' AND `status` = 1";
  $row = getarrayassoc($sqlSelect);
  $file_name = trim($row['cname']) . trim($row['fid']);
  $api_link .= '/documents/letter_api.php?sr=' . urlencode(trim($row['sr'])) . '&hname=' . urlencode($row['name']) . '&cname=' . urlencode($row['cname']) . '&fid=' . urlencode(trim($row['fid'])) . '&caddress=' . urlencode(trim($row['caddress'])) . '&ccity=' . urlencode(trim($row['ccity'])) . '&cdistrict=' . urlencode($row['cdistrict']) . '&cstate=' . urlencode($row['cstate']) . '&cpin=' . urlencode($row['cpin']) . '&hphoto=' . urlencode(trim($row['hphoto'])) . '&valid=' . urlencode(trim($_POST['valid']));
  url_get_contents($api_link);
  //echo $api_link;
  //  $file_name = str_replace(' ', '', $file_name);
  echo '<script type="text/javascript" language="Javascript">window.open("./documents/pdfs/' . $file_name . '.pdf","_self");</script>';
  //header('location: /../documents/pdfs/'.$file_name.'.pdf'); //redirects to the zip file to be downloaded
  exit();
}
