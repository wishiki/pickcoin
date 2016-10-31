<?php

$servername = "localhost";
$username = "******";
$password = "******";
$dbname = "******";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
	echo "Connect Error";
	die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT DISTINCT deviceUUID FROM ****** WHERE deviceUUID IS NOT NULL ORDER BY deviceUUID ASC"; //where deviceUIID bit + distinct + order by ... asc added by jan to avoice duplication

$result = $conn->query($sql);

$deviceUUID = array();
while($row = mysqli_fetch_assoc($result)) {
	$deviceUUID[] = $row;
}

echo json_encode($deviceUUID);

$conn->close();

?>
