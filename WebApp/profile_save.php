<?php
session_start();
$email = $_SESSION["customer_id"];
if(isset($_GET['name'])){
	$connection=mysqli_connect("sql290.main-hosting.eu","u117204720_food_club","5\$pANyPa^APH");
	$db=mysqli_select_db($connection,'u117204720_food_club');
	$name=$_GET['name'];
	$query="UPDATE customer SET name='$_GET[name]',phone='$_GET[phone]',address='$_GET[address]',preference='$_GET[preference]' WHERE email='$email'";
	$query_run=mysqli_query($connection,$query);
	

	if($query_run){
		echo"<script>alert('Data updated');window.location.replace('main.php')</script>";
	}else{
		echo"<script>alert('Data not updated')</script>";
	}
}
?>