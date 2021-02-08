<?php
require_once 'googlesignin/vendor/autoload.php';
$id_token = $_POST["idtoken"];
$name = $_POST["name"];
$image = $_POST["image"];
$email = $_POST["email"];
$CLIENT_ID = "741878761514-o7u4s9j21jjlq4opimncc64lpef966rc.apps.googleusercontent.com";
$client = new Google_Client(['client_id' => $CLIENT_ID]);
$payload = $client->verifyIdToken($id_token);
if ($payload) {
	$servername = "sql290.main-hosting.eu";
	$username = "u117204720_food_club";
	$password = "5\$pANyPa^APH";
	$dbname = "u117204720_food_club";
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}
	$sql = "SELECT email FROM customer where email = ".$email;
	$result = $conn->query($sql);
	if ($result) {
	  	$sql = "INSERT INTO `customer`(`email`, `name`) VALUES ('$email','$name')";
		$conn->query($sql);
		$sql = "INSERT INTO `login`(`email`, `password`) VALUES ('$email','google_signin')";
		$conn->query($sql);
	}
	session_start();
	$_SESSION["customer_id"]=$email;
	echo "1";
	$conn->close();
} else {
  echo "0";
}



