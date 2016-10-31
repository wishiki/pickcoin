<?php

$jikan=$_POST["jikan"];
$coinUUID=$_POST["coinUUID"];
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

$sql = "INSERT INTO ****** (coinvalue, lat, lng, time, coinUUID, deviceUUID, spent, dropped_by) VALUES ('0.10', NULL, NULL, '$jikan', '$coinUUID', '$deviceUUID', 'NO', 'ffffff');";

$result = $conn->query($sql);

$conn->close();

?>
