<?php

$jikan=$_POST["jikan"];
$deviceUUID=$_POST["deviceUUID"];

$servername = "localhost";
$username = "******";
$password = "******";
$dbname = "******";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
	echo "Connect Error";
	die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE ****** SET spent = 'YES', deviceUUID = NULL, time = '$jikan' WHERE deviceUUID = '$deviceUUID' AND dropped_by != 'ffffff' ORDER BY RAND() LIMIT 10;";

$result = $conn->query($sql);

$conn->close();

?>
