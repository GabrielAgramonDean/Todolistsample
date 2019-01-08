<?php
$host = "db4free.net";
$username = "username10";
$password = "killswitch10";
$dbname = "todolistapp";

$conn = mysqli_connect($host, $username, $password, $dbname);

if (!$conn) {
	die ('connection failed' . mysql_error($conn));
}

echo 'connected successful' . "<br>";


?>