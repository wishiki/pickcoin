<?php

$la=$_POST["la"];
$ln=$_POST["ln"];
$device=$_POST["device"];

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
				SET deviceUUID = NULL,
				lat = '$la',
				lng = '$ln',
				dropped_by = '$device'
				WHERE deviceUUID = '$device'
				ORDER BY RAND()
				LIMIT 1
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
