<?php
$host = '127.0.0.1';
$user = 'eskill_admin';
$password = '$Y370=Iv1Yc8';
$db = 'eskill_development';
//create mysql connection
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = mysqli_connect($host, $user, $password, $db);
if ($mysqli == False) {
  printf("Connection failed: %s\n", mysqli_connect_error());
  die();
}
function runQuery($query)
{
  $result = mysqli_query($GLOBALS['mysqli'], $query);
  while ($row = mysqli_fetch_assoc($result)) {
    $resultset[] = $row;
  }
  if (!empty($resultset)) {
    return $resultset;
  }
}
function fetch_data($table_name, $where, $match, $data)
{
  $sql = "SELECT $data FROM $table_name WHERE $where ='$match'";
  $result = mysqli_query($GLOBALS['mysqli'], $sql);
  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      $f_data = $row[$data];
    }
  } else {
    $f_data = '0';
  }
  return $f_data;
}