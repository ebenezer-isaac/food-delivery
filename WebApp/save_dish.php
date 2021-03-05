<?php
	session_start();
	require_once __DIR__ . '/vendor/autoload.php';
	$manager = new MongoDB\Client("mongodb+srv://food_delivery:contech%402021@food-delivery.3ukn0.mongodb.net/food_delivery?authSource=admin&replicaSet=atlas-o0xpuf-shard-0&w=majority&readPreference=primary&appname=MongoDB%20Compass&retryWrites=true&ssl=true");
	$collection = $manager->food_delivery->restaurants;
	$id = $_SESSION["id"];
	$type = $_GET["type"];
	$name = $_GET["name"];
	$category = $_GET["category"];
	$cuisine = $_GET["cuisine"];
	$taste = $_GET["taste"];
	$price = $_GET["price"];
	if($type=="new"){
		$insertResult = $collection->insertOne(
		['id' => $id],
		['$set' => ['name' => $name,'phone' => $phone,'address' => $address,'preference' => $preference]]);
		if($insertResult){
			echo"Data updated";
		}else{
			echo"An Error Occured";
		}
	}else if($type=="update"){
		$dish_id = $_GET["id"];
		$updateResult = $collection->updateOne(
		['id' => $id],
		['$set' => ['name' => $name,'phone' => $phone,'address' => $address,'preference' => $preference]]);
		if($updateResult){
			echo"Data updated";
		}else{
			echo"An Error Occured";
		}
	}	
?>