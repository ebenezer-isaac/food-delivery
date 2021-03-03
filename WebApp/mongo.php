<?php
	require_once __DIR__ . '/vendor/autoload.php';
	try {
	    $manager = new MongoDB\Driver\Manager("mongodb+srv://food_delivery:contech%402021@food-delivery.3ukn0.mongodb.net/food_delivery?authSource=admin&replicaSet=atlas-o0xpuf-shard-0&w=majority&readPreference=primary&appname=MongoDB%20Compass&retryWrites=true&ssl=true");
		$query = new MongoDB\Driver\Query([]);
		$filter = ['id' => '0'];
		$query = new \MongoDB\Driver\Query($filter);
		$cursor = $manager->executeQuery("food_delivery.agents",$query);
		foreach($cursor as $document){
		    echo $document->name;
		    echo $document->vehicle_model;
		}
	}catch(Exception $e){
		echo $e;
	}
	?>
<?php
