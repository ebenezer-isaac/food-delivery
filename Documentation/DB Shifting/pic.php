<?php
$xml = simplexml_load_file("restaurants.xml");
foreach ($xml->restaurant as $restaurant) {
	foreach ($restaurant->dishes->dish as $dish) {
		$dish_name = $dish->dish_name; 
		$dish_pic = $dish->dish_pic;
		$query="UPDATE restaurant_dishes SET pic='$dish_pic' WHERE name like '%$dish_name%';";
		echo $query."<br>"."<br>";
	}
}