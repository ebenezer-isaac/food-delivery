<?php
	session_start();
	$email = $_SESSION["customer_id"];
	$name = $_GET["name"];
	$phone = $_GET["phone"];
	$address = $_GET["address"];
	$preference = $_GET["preference"];
	require_once __DIR__ . '/vendor/autoload.php';
	$manager = new MongoDB\Client("mongodb+srv://food_delivery:contech%402021@food-delivery.3ukn0.mongodb.net/food_delivery?authSource=admin&replicaSet=atlas-o0xpuf-shard-0&w=majority&readPreference=primary&appname=MongoDB%20Compass&retryWrites=true&ssl=true");
	$collection = $manager->food_delivery->customers;
	$insertOneResult = $collection->updateOne(
	['email' => $email],
	['$set' => ['name' => $name,'phone' => $phone,'address' => $address,'preference' => $preference]]);
	if($insertOneResult){
		echo"<script>alert('Data updated');window.location.replace('main.php?url=profile.php');</script>";
	}else{
		echo"<script>alert('Data not updated');window.location.replace('main.php?url=profile.php');</script>";
	}
?>