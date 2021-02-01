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
    $xml = simplexml_load_file("./database/login.xml");
	foreach ($xml->customer as $customer) {
		if($email == (string)$customer->email_id && $hashed == (string)$customer->password ){
			session_start();
        	$_SESSION["customer_id"]=(string)$customer->customer_id;
        	exit("1");	
            echo (string)$customer->customer_id;
		}	    
	}
    exit("0");
}

