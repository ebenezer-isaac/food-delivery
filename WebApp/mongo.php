<?php

$manager = new MongoDB\Driver\Manager("mongodb+srv://food_delivery:contech%402021@food-delivery.3ukn0.mongodb.net/food_delivery?authSource=admin&replicaSet=atlas-o0xpuf-shard-0&w=majority&readPreference=primary&appname=MongoDB%20Compass&retryWrites=true&ssl=true");

$query = new MongoDB\Driver\Query([]);

$cursor = $manager->executeQuery("food_delivery.food_delivery");


foreach($cursor as $document){

    var_dump($document);
}

?>


