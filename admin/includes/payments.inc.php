<?php fetch_global('addmarks', 'trid', 'cid', 'Approve', 'advance', 'center', 'amount', 'remark', 'center');
// $result = getamultiassoc("SELECT `fid`, `cname` FROM `franchisee` WHERE 1");
// foreach ($result as $row) {
//     if ($row['fid'] === $center) {
//         $fr_options .= '<option selected value="' . $row['fid'] . '">' . case_name($row['cname']) . ' (' . $row['fid'] . ')</option>';
//     } else
//         $fr_options .= '<option  value="' . $row['fid'] . '">' . case_name($row['cname']) . ' (' . $row['fid'] . ')</option>';
// }
if ($action === 'approve') {
    $sqlSelect = "SELECT `fund_request`.`sr`,`wallet_id`, `user`, `amount`, `trans_id`, `fund_request`.`dmedium`,`fund_request`.`dby`,`fund_request`.`status`, `requested_date`, `fr`.`name` FROM `fund_request` , `client_details` fr WHERE `fr`.`cid`= `user` AND `fund_request`.`status`=0";
    $payments = getamultiassoc($sqlSelect);
}
if ($action === 'viewwallets') {
    if ($action === 'viewwallets') {
        $sqlSelect = "SELECT  `wallet`.`wallet_id`, `balance`,`wall_password`, `created`, `fr`.`cname` FROM `wallet`,`franchisee` fr WHERE `fr`.`fid`= `wallet_id` AND `fr`.`status`=1";
        $wallets = getamultiassoc($sqlSelect);
    }
}
if ($action === 'direct' && $advance == 'confirm') {
    $temp = getarrayassoc('SELECT  `w`.`balance` FROM  `wallet` `w` WHERE `wallet_id`="' . $center . '"');
    $pre = $temp['balance'];
    $upamount = $amount + $pre;
    $sql = "UPDATE `wallet` SET `balance`= " . $upamount . " WHERE `wallet_id` = '" . $center . "'";
    $sql1 = "INSERT INTO `personal_fund`( `user`, `amount`, `trans_id`, `status`) VALUES ('" . $center . "','" . $amount . "','" . $remark . "',1)";
    if (runQuery($sql) && runQuery($sql1)) {
        $msg = 2;
    }
}
if ($action === 'approve' && $cid != "" && $Approve == 'Approve') {
    $temp = getarrayassoc('SELECT `fr_req`.`wallet_id`, `fr_req`.`user`, `fr_req`.`amount`,`fr_req`.`dmedium`,`fr_req`.`dby`, `fr_req`.`trans_id`, `w`.`balance` FROM `fund_request` `fr_req`, `wallet` `w` WHERE `user`="' . $cid . '" AND `status`=0 AND `w`.`wallet_id`=`user`');
    $amount = $temp['amount'];
    $upamount = $amount + $temp['balance'];
    $sql = "UPDATE `wallet` SET `balance`= " . $upamount . " WHERE `wallet_id` = '" . $cid . "'";
    $sql1 = "UPDATE `fund_request` SET `status`= 1 WHERE `user`= '" . $cid . "' AND `amount` = '" . $amount . "' AND `sr` = '" . $trid . "'";
    print_r($sql . $sql1);
    // die();
    if (runQuery($sql) && runQuery($sql1)) {
        $msg = 2;
        header("location:?pid=6&action=approve");
        exit();
    }
}
if ($action === 'transactions')
    $viewPassbook = getamultiassoc("SELECT `fr`.`sr`, `fr`.`user`, `fr`.`amount`, `fr`.`trans_id`, `fr`.`remark`, `fr`.`status`, `fr`.`requested_date` FROM `fund_request` `fr` WHERE  `status` = 1 GROUP BY `fr`.`trans_id` ORDER BY `fr`.`requested_date`");
