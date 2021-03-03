<?php
$xml = simplexml_load_file("restaurants.xml");
foreach ($xml->restaurant as $restaurant) {
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
	$name = (string)$restaurant->name;
	$rating = (string)$restaurant->rating;
	$address = (string)$restaurant->address;
	$sql = "INSERT INTO `restaurants`(`name`, `rating`, `address`) VALUES ('$name',$rating,'address')";

	if ($conn->query($sql) === TRUE) {
	  echo "New record created successfully<br>";
	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
}	


