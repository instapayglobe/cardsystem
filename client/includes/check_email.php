<?php
error_reporting(E_ALL);
ini_set('display_error', 1);
// error_reporting(0);
// Include config file
require "../../admin/includes/logic/define-config.php";
require "../../admin/includes/logic/functions.php";
require "../../admin/includes/logic/config.php";

$sql = "SELECT count(`email`) as email FROM `client_details` WHERE email = '" . $_POST['email'] . "' OR contact = '" . $_POST['email'] . "' ";
$result = getarrayassoc($sql);
// echo $sql;
if(is_array($result)){
if ($result['email'] !== '0') {
    echo 'true'.$sql;
}
else echo 'false'.$sql;
} else
{
     echo 'false'.$sql;
}