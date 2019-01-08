<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "todo_app_db";

$conn = mysqli_connect($host, $username, $password, $dbname);

if (!$conn) {
	die ('connection failed' . mysql_error($conn));
}

echo 'connected successful' . "<br>";


?>