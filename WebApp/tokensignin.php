<?php
require_once 'googlesignin/vendor/autoload.php';
$id_token = $_POST["idtoken"];
$name = $_POST["name"];
$image = $_POST["image"];
$email = $_POST["email"];
$CLIENT_ID = "741878761514-o7u4s9j21jjlq4opimncc64lpef966rc.apps.googleusercontent.com";
$client = new Google_Client(['client_id' => $CLIENT_ID]);
$payload = $client->verifyIdToken($id_token);
if ($payload) {
	session_start();
	$_SESSION["customer_id"]=$email;
	echo "1";
	require_once 'vendor/autoload.php';
	$manager = new MongoDB\Driver\Manager("mongodb+srv://food_delivery:contech%402021@food-delivery.3ukn0.mongodb.net/food_delivery?authSource=admin&replicaSet=atlas-o0xpuf-shard-0&w=majority&readPreference=primary&appname=MongoDB%20Compass&retryWrites=true&ssl=true");
	$query = new MongoDB\Driver\Query([]);
	$filter	  = ['email' => $email];
	$query = new \MongoDB\Driver\Query($filter);
	$cursor = $manager->executeQuery("food_delivery.login",$query);
	$flag=0;
	foreach($cursor as $document){
		$flag=1;
	}
	if($flag==0){
		$manager = new MongoDB\Client("mongodb+srv://food_delivery:contech%402021@food-delivery.3ukn0.mongodb.net/food_delivery?authSource=admin&replicaSet=atlas-o0xpuf-shard-0&w=majority&readPreference=primary&appname=MongoDB%20Compass&retryWrites=true&ssl=true");
		$collection = $manager->food_delivery->login;
		$insertOneResult = $collection->insertOne(
		['email' => $email,"password":"google_signin"]);
		$collection = $manager->food_delivery->customers;
		$insertOneResult = $collection->insertOne(
		['email' => $email]);
	}
} else {
  echo "0";
}



