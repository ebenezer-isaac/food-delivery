<?php
	session_start();
	$email = $_SESSION["customer_id"];
	$password = $_GET["password_con"];
	$hashed = hash('sha256', $password);
	require_once __DIR__ . '/vendor/autoload.php';
	$manager = new MongoDB\Client("mongodb+srv://food_delivery:contech%402021@food-delivery.3ukn0.mongodb.net/food_delivery?authSource=admin&replicaSet=atlas-o0xpuf-shard-0&w=majority&readPreference=primary&appname=MongoDB%20Compass&retryWrites=true&ssl=true");
	$collection = $manager->food_delivery->login;
	$insertOneResult = $collection->updateOne(
	['email' => $email],
	['$set' => ['password' => $hashed]]);
	if($insertOneResult){
		echo"<script>alert('Password has been changed');window.location.replace('main.php?url=profile.php');</script>";
	}else{
		echo"<script>alert('An Error occured, try again later');window.location.replace('main.php?url=profile.php');</script>";
	}
?>