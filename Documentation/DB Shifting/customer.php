<?php
$xml = simplexml_load_file("profile.xml");
foreach ($xml->customer as $profile) {
	$servername = "sql290.main-hosting.eu";
	$username = "u117204720_food_club";
	$password = "5\$pANyPa^APH";
	$dbname = "u117204720_food_club";
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
    }
    $email = (string)$profile->emailid;
    $name = (string)$profile->name;
	$phone = (string)$profile->phonenumber;
    $address = (string)$profile->address;
    $preference = (string)$profile->preference;	
	$sql = "INSERT INTO `customer`(`email`, `name`, `phone`, `address`, `preference`) VALUES ('$email','$name',$phone,'$address','$preference')";

	if ($conn->query($sql) === TRUE) {
	  echo "New record created successfully<br>";
	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
}