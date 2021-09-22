<?php
$data = $api = $database = $host = $user = $pass = "";
$api .= "?school=" . $_POST['school'] . "";
$data = file_get_contents("http://" . $_SERVER['HTTP_HOST'] . "/smartEdge/database.php/" . $api, true);

//print_r($data);
$data = json_decode($data, true);
if (is_array($data)) {
  $_SESSION['database'] = $data['dbname'];
  $_SESSION['user'] = $data['dbuser'];
  $_SESSION['pass'] = $data['dbpass'];
  $_SESSION['host'] = $data['dbhost'];
}
define('DB_SERVER', (isset($_SESSION['host'])) ? $_SESSION['host'] : 'localhost');
define('DB_SERVER_USERNAME', (isset($_SESSION['user'])) ? $_SESSION['user'] : 'root');
define('DB_SERVER_PASSWORD', (isset($_SESSION['pass'])) ? $_SESSION['pass'] : "");
define('DB_DATABASE', (isset($_SESSION['database'])) ? $_SESSION['database'] : 'smartm79_ais');
