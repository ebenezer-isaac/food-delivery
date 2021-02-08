<?php
$page = "Organizer Login";
#include "logger.php";
$email = filter_input(INPUT_GET, "email");
$pass = filter_input(INPUT_GET, "pwd");
$temp = $pass;
$temp = preg_replace("/\\s+/", "", $temp);
$temp = preg_replace("/[A-Za-z0-9]+/", "", $temp);
$temp = preg_replace("/\"/", "'", $temp);
if ($temp == "'''='") {
    exit("2");
} else {
    $hashed = hash('sha256', $pass);
    $servername = "sql290.main-hosting.eu";
    $username = "u117204720_food_club";
    $password = "5\$pANyPa^APH";
    $dbname = "u117204720_food_club";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT email, password FROM login where email = '$email' and password = '$hashed'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        session_start();
        $_SESSION["customer_id"]=$email;
        echo "1";
    }else{
        exit("0");
    }
    
    $conn->close();   
}

