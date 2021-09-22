<?php
fetch_global('admission');
if ($action === 'admission_form' || $action === 'identity_card') {
    $sqlSelect = "SELECT `sid`,`status`,`course`,`course_id`, `name`, `father_name`, `mother_name`, `adhaar`, `email`, `contact`, `address`, `dob`, `qualification`, `village`, `distt`, `state`, `adate`, `edate`, `student_photo`,`entry_date` FROM `student_details` WHERE `sponsor` = '" . $_SESSION['usercode'] . "'";
    $viewStudent = getamultiassoc($sqlSelect);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_REQUEST['download'] == 'card') {
        $api = 'api';
    } else if ($_REQUEST['download'] == 'form') {
        $api = 'admission_api';
    }
    $api_link = WEBSITE . dirname($_SERVER['PHP_SELF']) . "/pdf/";
    $student = trim($_POST['student_id']);
    $sqlSelect = "SELECT `sd`.`sponsor`, `sd`.`sid`, `sd`.`course`, `sd`.`name`, `sd`.`father_name`, `sd`.`mother_name`, `sd`.`contact`, `sd`.`address`, `sd`.`dob`,`sd`.`qualification`, `sd`.`village`, `sd`.`distt`, `sd`.`state`, `sd`.`adate`, `sd`.`edate`, `sd`.`student_photo`, `sd`.`signature_photo`,`fr`.`cname`, `fr`.`caddress`, `fr`.`landmark`, `fr`.`ccity`, `fr`.`cdistrict`, `fr`.`cstate`, `fr`.`cmobile`, `fr`.`cpin` FROM `student_details` `sd`, `franchisee` `fr` WHERE `sid` = '" . $student . "' AND `fr`.`fid`= `sd`.`sponsor`";
    $result = getamultiassoc($sqlSelect);
    foreach ($result as $row) { //checks if the event name is alphanumeric
        $file_name = ($api == 'api') ? 'cards/' . $row['name'] . '_id' : 'forms/' . $row['name'];
        $sid = $row['sponsor'];
        $api_link .= '/' . $api . '.php?enroll=' . urlencode(trim($row['sid'])) . '&course=' . urlencode(trim($row['course'])) . '&name=' . urlencode(trim($row['name'])) . '&fname=' . urlencode($row['father_name']) . '&mname=' . urlencode($row['mother_name']) . '&contact=' . urlencode($row['contact']) . '&address=' . urlencode(trim($row['address'])) . '&dob=' . urlencode(trim($row['dob'])) . '&qualification=' . urlencode(trim($row['qualification'])) . '&village=' . urlencode(trim($row['village'])) . '&distt=' . urlencode(trim($row['distt'])) . '&state=' . urlencode(trim($row['state'])) . '&adate=' . urlencode(trim($row['adate'])) . '&edate=' . urlencode(trim($row['edate'])) . '&image=' . urlencode($row["student_photo"]) . '&signature=' . urlencode($row['signature_photo']) . '&cname=' . urlencode(trim($row['cname'])) . '&caddress=' . urlencode(trim($row['caddress'])) . '&landmark=' . urlencode(trim($row['landmark'])) . '&ccity=' . urlencode($row['ccity']) . '&cdistrict=' . urlencode($row['cdistrict']) . '&cpin=' . urlencode(trim($row['cpin'])) . '&cstate=' . urlencode(trim($row['cstate'])) . '&cmobile=' . urlencode(trim($row['cmobile']));
    }
    //  print_r($api_link); die();
    url_get_contents($api_link);
    //makes a request to our pdf generator api for each participant 
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
    echo '<script type="text/javascript" language="Javascript">window.open("./pdf/downloads/' . $file_name . '.pdf","_blank");</script>';
    //header('location: ./'.$file_name.'.pdf'); //redirects to the zip file to be downloaded
}
