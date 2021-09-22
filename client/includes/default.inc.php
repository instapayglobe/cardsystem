<?php
// Processing form data when form is submitted
if ($pid == 0) {
    $sql = "SELECT count(*) as total_student, 
    (SELECT balance FROM wallet wt WHERE `wallet_id` ='" . $_SESSION['usercode'] . "') as wallet_amount, 
    (SELECT sum(`amount`) as paid FROM `tr_sts` trst WHERE `user_id` ='" . $_SESSION['usercode'] . "') as paid
    from client_details WHERE `cid` ='" . $_SESSION['usercode'] . "' ";
    $default = getarrayassoc($sql);
    //print_r($profile); die();
}
