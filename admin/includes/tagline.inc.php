<?php
fetch_global('addTagline', 'id');
if (($action === 'addTagline' || $action === 'editTagline') && $addTagline === 'confirm') {
  fetch_global("tsubject", "content", "addby");
  $sid = "SDTAG" . rand(10000, 999999999);
  if ($action === 'addTagline') {
    $sql = "INSERT INTO `tagline`(`subject`, `content`, `addby`) VALUES ('$tsubject',' $content', '$addby')";
  } else if ($action === 'editTagline') {
    $sql = "UPDATE `tagline` SET `subject` = '$tsubject', `content` = '$content', `addby` = '$addby' WHERE `tagline`.`sr` = '$id'";
  }
  if (runQuery($sql))
    header("location: ?pid=7&action=viewTagline&msg=1");
  exit();
}
if ($action === 'viewTagline') {
  $sqlSelect = "SELECT * FROM `tagline` WHERE 1";
  $viewTagline = getamultiassoc($sqlSelect);
}

if ($action === 'editTagline') {
  fetch_global('id');
  $sqlSelect = "SELECT * FROM `tagline` Where `sr` = '" . $id . "'";
  $editTagline = getarrayassoc($sqlSelect);
}

if ($action === 'deleteTagline') {
  fetch_global('id');
  $sqlSelect = "DELETE FROM `tagline` WHERE `tagline`.`sr` = '" . $id . "'";
  if (runQuery($sqlSelect)) {
    header("location: ?pid=7&action=viewTagline&msg=3");
    exit();
  }
}