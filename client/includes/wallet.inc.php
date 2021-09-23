<?php
// Processing form data when form is submitted
if ($action === 'addmoney')
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    fetch_global('add_now','agree');
    if($add_now === 'adding') {
    fetch_global('amount', 'deposite_by', 'dmedium', 'remark');
    if($amount>0){
    $sql = "INSERT INTO `fund_request`( `wallet_id`, `user`, `amount`, `trans_id`, `status`, `dmedium`, `dby`,`remark`) VALUES ('X','" . $_SESSION['usercode'] . "', " . $amount . ", '" . getToken(12) . "',0, '" . $dmedium . "', '" . $deposite_by . "', '" . $remark . "')";
    if (runQuery($sql)) {
      $msg = 7;
    } else { $error = 'No account found with that {$param_user}';
      $msg = 7;
    }
  }}
} else
{
  $msg = 6;
  $error = "Something went wrong";

}
if($agree === 'cardPayment') { 
  $netAmount = 0;
  fetch_global('amount','carde','cardcvv');
  $cardVerify = getarrayassoc("SELECT  `refernce`, `cardValue`,
  (SELECT  `balance` FROM `wallet` WHERE `wallet_id` =  '". $_SESSION['usercode']."' ) AS `wbalance`  
  FROM `cards_details` WHERE  `cardno`={$_POST['cardn']} AND `cardExpire`='{$_POST['carde']}' AND `cardCvv`='{$_POST['cardcvv']}' AND `cardPin`='{$_POST['cardpin']}' AND `nameOncard`='{$_POST['ncard']}' AND `status`=0");
      $netAmount = $cardVerify['cardValue']-$amount;
      if($netAmount>=0) {
      $creditAmount = $amount - ($amount*0.0047);
      $wallet_bal = $creditAmount + $cardVerify['wbalance'];
      $sql = "UPDATE `wallet` SET `balance`='" . $wallet_bal . "' WHERE `wallet_id`= '" .  $_SESSION['usercode'] . "';";
        $sql .= "UPDATE `cards_details` SET `status`= ".($netAmount>0? 0 : 1).",`cardValue` = $netAmount WHERE `cardno`={$_POST['cardn']} AND `cardExpire`='{$_POST['carde']}' AND `cardCvv`='{$_POST['cardcvv']}'AND `cardPin`='{$_POST['cardpin']}'AND `nameOncard`='{$_POST['ncard']}';";
        $sql.="INSERT INTO `fund_request`( `wallet_id`, `user`, `amount`, `wallet_balance`, `trans_id`, `status`, `dmedium`, `dby`, `remark`) VALUES 
        ( 'X', '". $_SESSION['usercode'] ."','". $creditAmount."','". $cardVerify['wbalance']."','".getToken(10)."', 1, 'GIFT CARD ADD','" .  $_SESSION['usercode'] . "','ADD MONEY USING GIFT CARD'  );";
        $sql .= 'INSERT INTO `tr_sts`(`user_id`, `amount`, `wallet_balance`, `remark`,`trasaction_id`) VALUES ("' . $_SESSION['usercode'] . '","'. ($amount*0.0047).'","'. $cardVerify['wbalance'].'","GIFT CARD ADD","'.getToken(10).'" );';
       if (runmQuery($sql))
      //  echo $sql;
      //  print_r($cardVerify);
      //  die();
          $msg=4;
      }
      else {
        $msg = 5;
      }
}
if ($action === 'viewwallet') {
  $viewWallet = getamultiassoc("SELECT `fr`.`sr`, `fr`.`user`, `fr`.`amount`, `fr`.`trans_id`, `fr`.`status`, `fr`.`dby`,`fr`.`requested_date` FROM `fund_request` `fr` WHERE `fr`.`user` = '" . $_SESSION['usercode'] . "' ORDER BY `fr`.`requested_date` DESC ");
}
if ($action === 'viewInline') {
  $viewWallet = getamultiassoc("SELECT `fr`.`sr`, `fr`.`user`, `fr`.`amount`, `fr`.`trans_id`, `fr`.`status`, `fr`.`dby`,`fr`.`requested_date` FROM `fund_request` `fr` WHERE `fr`.`user` = '" . $_SESSION['usercode'] . "' AND `fr`.`status` = 0  ORDER BY `fr`.`requested_date` DESC ");
}
if ($action === 'paymentPage') {
  fetch_global('create','amount','deposite_by','remark');
  if($create==='creating')
  {
    if($_SERVER['REQUEST_METHOD']==='POST')
    {
      $pageSql = "INSERT INTO `payments_page`( `refNo`, `apiId`, `amount`, `dby`,  `remark`) VALUES 
                                              ( '".getToken(12)."','".$_SESSION['api']."','".$amount."','".$deposite_by."','".$remark."' )";
      if(runQuery($pageSql))
      $msg =2;  
  }
  }
  $viewWallet = getamultiassoc("SELECT `sr`, `refNo`, `apiId`, `amount`, `dby`, `status`, `remark`, `requested_on` FROM `payments_page` WHERE `apiId` = '" . $_SESSION['api'] . "'  ORDER BY `requested_on` DESC ");
}