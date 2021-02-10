<?php
if(isset($_COOKIE['res_id']) && isset($_COOKIE["cart_obj"])) {
	$res_id = $_COOKIE['res_id'];
	$cart = $_COOKIE["cart_obj"];
	echo $cart;
	$cart = json_decode($cart);
	print_r($cart);
}