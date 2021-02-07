<?php
$xml = simplexml_load_file("deliveryagent.xml");
foreach ($xml->agent as $agent) {
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
$name = (string)$agent->name;
$phone = (string)$agent->phone;
$date_value = (string)$agent->join_date;
$join_date = date("Y/m/d", strtotime($date_value));
$vehicle_no = (string)$agent->vehicle_no;
$vehicle_type = (string)$agent->vehicle_type;

$sql = "INSERT INTO `agent`(`name`, `phone`, `joindate`,`vehicle_no`,
`vehicle_model`) VALUES ('$name','$phone','$join_date','$vehicle_no','$vehicle_type')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully<br>";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}
