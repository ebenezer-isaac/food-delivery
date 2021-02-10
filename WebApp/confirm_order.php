<?php
require_once('config.php');
session_start();

if(isset($_COOKIE['res_id']) && isset($_COOKIE["cart_obj"])) {
	
	$res_id = $_COOKIE['res_id'];
	$cart = $_COOKIE["cart_obj"];

	$cart = json_decode($cart);

	date_default_timezone_set('Asia/Calcutta');
	$date = date("Y-m-d h:i:s");
	$agent="";
	if(empty($agent))
	{
	
	$query1="SELECT * FROM agent ORDER BY RAND() LIMIT 1 ";
	$result1=mysqli_query($conn,$query1) or trigger_error(mysqli_error($conn));
	if($row=mysqli_fetch_assoc($result1))
	{
		$agent=$row['agent_id'];
	

	}
		}
	$email=$_SESSION["customer_id"];


	$query="SELECT * FROM customer WHERE email='$email'";
	$result=mysqli_query($conn,$query) or trigger_error(mysqli_error($conn));
	if($row=mysqli_fetch_assoc($result))
	{
		$address=$row['address'];


	}
	$status ='O';


	$query2="INSERT INTO `orders`(`email`, `restaurant_id`, `agent_id`, `date_time`, `delivery_address`, `status`) 
	VALUES ('$email','$res_id','$agent','$date','$address','$status')";
	$result2=mysqli_query($conn,$query2) or trigger_error(mysqli_error($conn));
	
	
	$query5="SELECT order_id FROM orders WHERE email='$email' AND date_time='$date' ";
	$result5=mysqli_query($conn,$query5) or trigger_error(mysqli_error($conn));
	if($row=mysqli_fetch_assoc($result5))
	{
		$o_id=$row['order_id'];
		

	}

	foreach($cart as $dish_id=>$qty){
		
		$query1="SELECT * FROM restaurant_dishes WHERE dish_id='$dish_id'";
		$result1=mysqli_query($conn,$query1) or trigger_error(mysqli_error($conn));
		if($row=mysqli_fetch_assoc($result1))
		{
			$price=$row['price'];
			

			$query2="INSERT INTO `ordered_dishes`(`order_id`, `dish_id`, `price`, `quantity`) VALUES ('$o_id','$dish_id','$price','$qty') ";
			$result2=mysqli_query($conn,$query2) or trigger_error(mysqli_error($conn));
	
		}
	}
	
	
}