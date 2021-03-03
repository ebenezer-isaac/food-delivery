<?php
session_start();
$email = $_SESSION["customer_id"];
require_once __DIR__ . '/vendor/autoload.php';
$manager = new MongoDB\Driver\Manager("mongodb+srv://food_delivery:contech%402021@food-delivery.3ukn0.mongodb.net/food_delivery?authSource=admin&replicaSet=atlas-o0xpuf-shard-0&w=majority&readPreference=primary&appname=MongoDB%20Compass&retryWrites=true&ssl=true");
$collection = (new MongoDB\Client)->food_delivery->customers;
$insertOneResult = $collection->insertOne([
    'email' => 'ebnezr.isaac@gmail.com',
    'name' => 'Admin User',
]);

printf("Inserted %d document(s)\n", $insertOneResult->getInsertedCount());

var_dump($insertOneResult->getInsertedId());

// 	require_once __DIR__ . '/vendor/autoload.php';
// 	try {
// 	    $manager = new MongoDB\Driver\Manager("mongodb+srv://food_delivery:contech%402021@food-delivery.3ukn0.mongodb.net/food_delivery?authSource=admin&replicaSet=atlas-o0xpuf-shard-0&w=majority&readPreference=primary&appname=MongoDB%20Compass&retryWrites=true&ssl=true");
// 		$query = new MongoDB\Driver\Query([]);
// 		$filter = ['id' => '0'];
// 		$query = new \MongoDB\Driver\Query($filter);
// 		$cursor = $manager->executeQuery("food_delivery.agents",$query);

// $collection = (new MongoDB\Client)->test->restaurants;

// $updateResult = $collection->updateOne(
//     [ 'restaurant_id' => '40356151' ],
//     [ '$set' => [ 'name' => 'Brunos on Astoria' ]]
// );


// 		$name = "";
// 		$phone = "";
// 		$address = "";
// 		$preference = "";
// 		session_start();
// 		$email = $_SESSION["customer_id"];
// 		foreach($cursor as $customer){
// 		    $name	 = $customer->name;
// 			$phone = $customer->phone;
// 			$address = $customer->address;
// 			$preference = $customer->preference;
// 		}
// 	}catch(Exception $e){
// 		echo $e;
// 	}

// if(isset($_GET['name'])){
// 	$connection=mysqli_connect("sql290.main-hosting.eu","u117204720_food_club","5\$pANyPa^APH");
// 	$db=mysqli_select_db($connection,'u117204720_food_club');
// 	$name=$_GET['name'];
// 	$query="UPDATE customer SET name='$_GET[name]',phone='$_GET[phone]',address='$_GET[address]',preference='$_GET[preference]' WHERE email='$email'";
// 	$query_run=mysqli_query($connection,$query);
	

// 	if($query_run){
// 		echo"<script>alert('Data updated');window.location.replace('main.php')</script>";
// 	}else{
// 		echo"<script>alert('Data not updated')</script>";
// 	}
// }
?>