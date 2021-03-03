<?php
require_once __DIR__ . '/vendor/autoload.php';
try {

    $manager = new MongoDB\Driver\Manager("mongodb+srv://food_delivery:contech%402021@food-delivery.3ukn0.mongodb.net/food_delivery?authSource=admin&replicaSet=atlas-o0xpuf-shard-0&w=majority&readPreference=primary&appname=MongoDB%20Compass&retryWrites=true&ssl=true");
	$query = new MongoDB\Driver\Query([]);
	$id           = new \MongoDB\BSON\ObjectId("603f1d84d7f4a6828d7aad22");
	$filter      = ['_id' => $id];
	$options = [];
	$query = new \MongoDB\Driver\Query($filter, $options);
	$cursor = $manager->executeQuery("food_delivery.food_delivery",$query);
	foreach($cursor as $document){
		//echo $document[str_replace(".","_dot_","ebnezr.isaac@gmail.com")];
	    var_dump($document->login);
	}
}catch(Exception $e){
	echo $e;
}
?>