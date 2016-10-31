<?php

$deviceUUID=$_GET["deviceUUID"];

$servername = "localhost";
$username = "******";
$password = "******";
$dbname = "******";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
	echo "Connect Error";
	die("Connection failed: " . $conn->connect_error);
}

$output = array( //added by jan 20160831
	"wallet" => 0,
	"spendable" => 0
);



$sql = "SELECT SUM(coinvalue) AS wallet FROM ****** WHERE deviceUUID = '$deviceUUID';";
$result = $conn->query($sql);
if($row = mysqli_fetch_assoc($result)) {
	$output["wallet"] = $row["wallet"]; //added by jan 20160831
}


$sql = "SELECT SUM(coinvalue) AS wallet FROM ****** WHERE deviceUUID = '$deviceUUID' AND dropped_by != 'ffffff';"; //added by jan 20160831
$result = $conn->query($sql);
if($row = mysqli_fetch_assoc($result)) {
	$output["spendable"] = $row["wallet"];
}

echo json_encode($output);

$conn->close();

?>
