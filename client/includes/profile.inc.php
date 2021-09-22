<?php
fetch_global('agree');
// Processing form data when form is submitted
if ($action === 'profile' || $action === 'setting') {
    $sql = "SELECT * FROM `franchisee` WHERE `fid` ='" . $_SESSION['usercode'] . "' ";
    $profile = getarrayassoc($sql);
    if ($agree === 'changeMypassword') {
        fetch_global('password', 'opassword');
            $sql = "UPDATE `franchisee` SET `passcode` = '" . $password . "' WHERE `franchisee`.`fid` ='" . $_SESSION['usercode'] . "' AND `passcode` = '" . $opassword . "' AND `status` = 1";
            //die(($sql));
            if (AffectedQuery($sql)==1) {
                $msg = 8;
            } else {
            $msg = 6;
            $error = "Your Old Password Incorrect";
        }
    }
}
