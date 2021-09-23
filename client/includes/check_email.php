<?php
error_reporting(E_ALL);
ini_set('display_error', 1);
// error_reporting(0);
// Include config file
require "../../admin/includes/logic/define-config.php";
require "../../admin/includes/logic/functions.php";
require "../../admin/includes/logic/config.php";

$sql = "SELECT `email` FROM `client_details` WHERE email = '" . $_POST['email'] . "' OR contact = '" . $_POST['email'] . "' ";
$result = getarrayassoc($sql);
// echo $sql;
if (strlen($result['email']) <= 4) {
    echo 'false';
}
else echo 'true';
