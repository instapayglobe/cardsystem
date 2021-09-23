<?php
if ($action == 'addcourse') {
    fetch_global('addmarks', 'enroll', 'id', 'add_course', 'edit');
    if ($add_course === 'adding') {
        fetch_global('course', 'course_code', 'course_duration', 'course_fee', 'no_subject');
        $sql = "INSERT INTO `course_name`(`c_code`, `c_name`, `c_dur`, `c_fees`, `c_subject_no`) VALUES ('$course_code','$course','$course_duration','$course_fee','$no_subject') ";
        if (runQuery($sql)) {
            header('location: ?pid=5&action=viewcourse&msg=2');
            exit();
        }
    } else if ($add_course === 'update') {
        fetch_global('course', 'course_code', 'course_duration', 'course_fee', 'no_subject');
        $sql = "UPDATE `course_name` SET `c_name`='$course',`c_dur`='$course_duration',`c_fees`='$course_fee',`c_subject_no`='$no_subject' WHERE `c_code` = '$edit'";
        if (runQuery($sql)) {
            header('location: ?pid=5&action=viewcourse&msg=2');
            exit();
        }
    }
    if ($edit != '') {
        $editCourse = getarrayassoc("SELECT * FROM `course_name` WHERE `c_code`='" . $edit . "'");
    }
}
if ($action == 'viewcourse' || $action == 'newsubject') {
    fetch_global('Approve');
    // $sql = "DELETE FROM `course_name` WHERE `c_code` = '$delete'";
    // if (runQuery($sql) && $delete != "") {
    //     $msg = 3;
    // }
    $viewCardsR = getamultiassoc('SELECT `sr`, (SELECT `name` FROM `client_details` WHERE cid = card_request.wallet_id ) as client,(SELECT `email` FROM `client_details` WHERE cid = card_request.wallet_id ) as clientMail, `wallet_id`, `trans_id`, `status`, `cardNo`, (SELECT card_amount from card_amounts where card_amount_id = card_request.amount) as `amount`, `remark`, `requested_on` FROM `card_request` WHERE `status` = 0 ORDER BY `requested_on` DESC');
    if ($Approve === 'Approve') {
        $options = "";
        fetch_global('trid');
$cards = array(5085,5318,6082,6083,6528,6071,6084,6529,6075,6073,6070,6078,6076,6530,5088,6528,6080,6529);
$x = 0;
        $card_request = getarrayassoc("SELECT `sr`, (SELECT `name` FROM `client_details` WHERE cid = card_request.wallet_id ) as client,(SELECT `email` FROM `client_details` WHERE cid = card_request.wallet_id ) as clientMail, `wallet_id`, `trans_id`, `status`, `cardNo`, (SELECT card_amount from card_amounts where card_amount_id = card_request.amount) as `amount`, `remark`, `requested_on` FROM `card_request` WHERE `trans_id` ='" . $trid . "'");
        $cardSql = "INSERT INTO `cards_details`(`refernce`, `cardno`, `cardExpire`, `cardCvv`, `cardPin`, `cardValue`, `cardholder`, `nameOncard`) VALUES";  
        $digit= $cards[rand(0,count($cards))];
        for($x=1;$x<=$card_request['cardNo'];$x++)
            {
                $cardNo=$digit.rand(111,999).rand(111,999).rand(11,99).rand(1111,9999) ;
                $cardExpire= rand(1,12).'/'.rand((date('y')+2), (date('y')+3));
                $cardCvv = rand(111,999);
                $cardpin=rand(1111,9999);
                $cardValue = $card_request['amount'];
                $card_holder = $card_request['wallet_id'];
                $cardRefernce = getToken(12);
                $nameoncard = $card_request['client'];
                $cardSql .= "('".$cardRefernce."','".$cardNo."','".$cardExpire."','".$cardCvv."','".$cardpin."','".$cardValue."','".$card_holder."','".$nameoncard."')";
                if($x!=$card_request['cardNo'])
                $cardSql.=',';
            }
            if (runQuery($cardSql)) {
                $cardSql = "UPDATE `card_request` SET `status` = '1' WHERE `trans_id` ='" . $trid . "'";
                if (runQuery($cardSql)) {
                    header('location: ?pid=5&action=viewcourse&msg=3');
                exit();
            }
        }
    }
}
if ($action == 'viewsubject' || $action == 'newsubject') {
    $viewSubject = getamultiassoc("SELECT *, (SELECT `name` FROM `client_details` WHERE cid = cards_details.cardholder ) as client FROM `cards_details` WHERE 1 ORDER BY `created` DESC");
}
