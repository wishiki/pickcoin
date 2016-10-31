<?php

$device=$_GET["device"];
$LAT=$_GET["LAT"];
$LNG=$_GET["LNG"];

$servername = "localhost";
$username = "******";
$password = "******";
$dbname = "******";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
	echo "Connect Error";
	die("Connection failed: " . $conn->connect_error);
}

$coinrows = "SELECT *, ( 6371 * acos( cos( radians($LAT) ) * cos( radians( lat ) ) * cos( radians( lng ) - radians($LNG) ) + sin( radians($LAT) ) * sin( radians( lat ) ) ) ) AS distance FROM ****** WHERE deviceUUID IS NULL AND spent = 'NO' HAVING distance < 0.1 ORDER BY distance LIMIT 0 , 20;";
$walletvalue = "SELECT SUM(coinvalue) AS wallet FROM ****** WHERE deviceUUID = '$device' AND spent ='NO';";

$result1 = $conn->query($coinrows);

$result2 = $conn->query($walletvalue);

$icecoin1 = array();
while($row1 = mysqli_fetch_assoc($result1)) {
	$icecoin1[] = $row1;
}

$icecoin2 = array();
while($row2 = mysqli_fetch_assoc($result2)) {
	$icecoin2[] = $row2;
}

$result3 = array('coins_nearby'=>$icecoin1, 'wallet'=>$icecoin2);

//echo json_encode($result3);

//echo(json_encode($result3,JSON_FORCE_OBJECT)); //since it should be an array, json_force_object was taken away by jan
echo(json_encode($result3));


$conn->close();

?>
