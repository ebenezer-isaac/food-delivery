<?php
	require_once __DIR__ . '/vendor/autoload.php';
	session_start();
	$email = $_SESSION["customer_id"];
	$name = "";
	$phone = "";
	$address = "";
	$preference = "";
	try {
	    $manager = new MongoDB\Driver\Manager("mongodb+srv://food_delivery:contech%402021@food-delivery.3ukn0.mongodb.net/food_delivery?authSource=admin&replicaSet=atlas-o0xpuf-shard-0&w=majority&readPreference=primary&appname=MongoDB%20Compass&retryWrites=true&ssl=true");
		$query = new MongoDB\Driver\Query([]);
		$filter = ['email' => $email];
		$query = new \MongoDB\Driver\Query($filter);
		$cursor = $manager->executeQuery("food_delivery.customers",$query);


		foreach($cursor as $customer){
			if(isset($customer->name)){
				$name = $customer->name;
			}
		    if(isset($customer->phone)){
				$phone = $customer->phone;
			}
			if(isset($customer->address)){
				$address = $customer->address;
			}
			if(isset($customer->preference)){
				$preference = $customer->preference;
			}
		}
	}catch(Exception $e){
		echo $e;
	}
?>
Profile
<br><br>
<form action="profile_save.php" method="get">
	<table style='overflow: auto;'>
		<tr>
			<td style='text-align:left;' width = '20%'>Name</td>
			<td width = '5%'> : </td>
			<td style='text-align:left;'><input type="text" name= "name" value= "<?php echo $name; ?> "size=30></td>
		</tr>
		<tr>
			<td style='text-align:left;'>Email</td>
			<td> : </td>
			<td style='text-align:left;'><input type="text" name= "email" value= "<?php echo $email; ?> "size=30 disabled></td>
		</tr>
		<tr>
			<td style='text-align:left;'>Phone</td>
			<td> : </td>
			<td style='text-align:left;'><input type="text" name= "phone" value= "<?php echo $phone; ?>" size=30></td>
		</tr>
		<tr>
			<td style='text-align:left;'>Address</td>
			<td> : </td>
			<td style='text-align:left;'><textarea name= "address" cols="33" rows="7"><?php echo $address;?></textarea></td>
		</tr>
		<tr>
			<td style='text-align:left;'>Preference</td>
			<td> : </td>
			<td style='text-align:left;'>
				<input type="radio" name="preference" <?php if($preference=="V") {echo "checked";}?> value="V">Veg&nbsp&nbsp&nbsp
				<input type="radio" name="preference" <?php if($preference=="N") {echo "checked";}?> value="N">Non Veg</br>
			</td>
		</tr>
	</table><br>
	<input type="submit" name= "update" value="Update"></p>
</form>
<br><br>
<form action="password_save.php" method="get">
	<table style='overflow: auto;'>
		<tr>
			<td style='text-align:left;' width = '20%'>New Password</td>
			<td width = '5%'> : </td>
			<td style='text-align:left;'><input onkeyup='checkPass()' type="password" name= "password_new" id= "password_new" size=30></td>
		</tr>
		<tr>
			<td style='text-align:left;'>Confirm Password</td>
			<td> : </td>
			<td style='text-align:left;'><input onkeyup='checkPass()' type="password" name= "password_con" id= "password_con" size=30></td>
		</tr>
	</table><br>
	<input type="submit" name= "update_pass" id= "update_pass" value="Change" disabled></p>
</form>
<script>
	function checkPass(){
		if(document.getElementById('password_new').value==document.getElementById('password_con').value){
			document.getElementById('update_pass').disabled=false;
		}else{
			document.getElementById('update_pass').disabled=true;
		}
	}