<?php
	session_start();
	$email = $_SESSION["customer_id"];
	$type = $_SESSION["customer_typ"];
	require_once 'vendor/autoload.php';
	$manager = new MongoDB\Client("mongodb+srv://food_delivery:contech%402021@food-delivery.3ukn0.mongodb.net/food_delivery?authSource=admin&replicaSet=atlas-o0xpuf-shard-0&w=majority&readPreference=primary&appname=MongoDB%20Compass&retryWrites=true&ssl=true");
	$name = $_GET["name"];
	$address = $_GET["address"];
	$cust_col = $manager->food_delivery->customers;
	$rest_col = $manager->food_delivery->restaurants;
	if($type=="1"){
		$phone = $_GET["phone"];
		$preference = $_GET["preference"];
		$insertOneResult = $cust_col->updateOne(
		['email' => $email],
		['$set' => ['name' => $name,'phone' => $phone,'address' => $address,'preference' => $preference]]);
		if($insertOneResult){
			echo"Data updated";
		}else{
			echo"An Error Occured";
		}
	}else if ($type=="2"){
		$res_id = $_SESSION["id"];
		$insertOneResult = $rest_col->updateOne(
		['res_id' => $res_id],
		['$set' => ['name' => $name,'address' => $address,]]);
		if($insertOneResult){
			echo"Data updated";
		}else{
			echo"An Error Occured";
		}
	}
?>