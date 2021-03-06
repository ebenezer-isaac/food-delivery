<?php
	session_start();
	require_once __DIR__ . '/vendor/autoload.php';
	$manager = new MongoDB\Client("mongodb+srv://food_delivery:contech%402021@food-delivery.3ukn0.mongodb.net/food_delivery?authSource=admin&replicaSet=atlas-o0xpuf-shard-0&w=majority&readPreference=primary&appname=MongoDB%20Compass&retryWrites=true&ssl=true");
	$collection = $manager->food_delivery->dishes;
	$type = $_SESSION["customer_typ"];
	if($type=="2"){
		$dish_id = $_GET["id"];
		$updateResult = $collection->deleteOne(["dish_id" => $dish_id]);
		if($updateResult){
			echo"Data updated";
		}else{
			echo"An Error Occured";
		}
	}	
?>