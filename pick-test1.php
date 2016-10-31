<?php

$device=$_POST["device"];
$coinUUID=$_POST["coinUUID"];
$jikan=$_POST["jikan"];

$servername = "localhost";
$username = "******";
$password = "******";
$dbname = "******";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
	echo "Connect Error";
	die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE ******
				SET deviceUUID = '$device',
				time = '$jikan'
				WHERE deviceUUID IS NULL
				AND
				coinUUID = '$coinUUID'
				;";

$result = $conn->query($sql);

if ($conn->affected_rows == 0) {
echo "NO";
}

else {
	echo "OK";
}

$conn->close();

?>
