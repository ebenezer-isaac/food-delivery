<?php
if(isset($_COOKIE['res_id']) && isset($_COOKIE["cart_obj"])) {
	$res_id = $_COOKIE['res_id'];
	$cart = $_COOKIE["cart_obj"];
	echo "res_id : ".$res_id."<br>";
	$cart = json_decode($cart);
	foreach($cart as $dish_id =>$qty){
		echo $dish_id." : ".$qty."<br>";
	}
}