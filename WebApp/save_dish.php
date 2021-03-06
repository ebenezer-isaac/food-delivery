<?php
	session_start();
	require_once __DIR__ . '/vendor/autoload.php';
	$manager = new MongoDB\Client("mongodb+srv://food_delivery:contech%402021@food-delivery.3ukn0.mongodb.net/food_delivery?authSource=admin&replicaSet=atlas-o0xpuf-shard-0&w=majority&readPreference=primary&appname=MongoDB%20Compass&retryWrites=true&ssl=true");
	$collection = $manager->food_delivery->dishes;
	$type = $_GET["type"];
	$name = $_GET["name"];
	$category = $_GET["category"];
	$cuisine = $_GET["cuisine"];
	$taste = $_GET["taste"];
	$price = $_GET["price"];
	if($type=="new"){
		$dish_id = $collection->count()+1;
		$res_id = $_SESSION["id"];
		$insertResult = $collection->insertOne(
			[
				'res_id' => $res_id,
				'dish_id' => $dish_id,
				'category' => $category, 
				"cuisine" => $cuisine, 
				"name" =>  $name, 
				//"pic" => $pic, 
				"taste" => $taste, 
				"price" => $price
	
			]
		);
		if($insertResult){
			echo"Data updated";
		}else{
			echo"An Error Occured";
		}
	}else if($type=="update"){
		$dish_id = $_GET["id"];
		$updateResult = $collection->updateOne(
			[
				"dish_id" => $dish_id,
			],
			['$set' => 
				[
					"category" => $category, 
					"cuisine" => $cuisine, 
					"name" =>  $name, 
					"taste" => $taste, 
					"price" => $price
				]
			]
		);
		if($updateResult){
			echo"Data updated";
		}else{
			echo"An Error Occured";
		}
	}	
?>