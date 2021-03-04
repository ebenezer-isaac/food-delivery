<?php
$page = "Organizer Login";
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
	require_once 'vendor/autoload.php';
	$manager = new MongoDB\Driver\Manager("mongodb+srv://food_delivery:contech%402021@food-delivery.3ukn0.mongodb.net/food_delivery?authSource=admin&replicaSet=atlas-o0xpuf-shard-0&w=majority&readPreference=primary&appname=MongoDB%20Compass&retryWrites=true&ssl=true");
	$query = new MongoDB\Driver\Query([]);
	$filter	  = ['email' => $email ,'password'=>$hashed];
	$options = [];
	$query = new \MongoDB\Driver\Query($filter, $options);
	$cursor = $manager->executeQuery("food_delivery.login",$query);
	foreach($cursor as $document){
		session_start();
		$_SESSION["customer_id"]=$email;
		echo "1";
		exit();
	}
	echo "0";
}
?>

