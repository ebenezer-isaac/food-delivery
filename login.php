<?php
$xml = simplexml_load_file("login.xml");
foreach ($xml->customer as $customer) {
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
 $email_id = (string)$customer->email_id;
 $password = (string)$customer->password;
 $sql = "INSERT INTO `login`(`email_id`,`password`) VALUES ('$email_id',$password)";

 if ($conn->query($sql) === TRUE) {
   echo "New record created successfully<br>";
 } else {
   echo "Error: " . $sql . "<br>" . $conn->error;
 }

 $conn->close();
}

Displaying agent_sql.php. 