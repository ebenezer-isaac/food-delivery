<?php
	require_once __DIR__ . '/vendor/autoload.php';
	try {
	    $manager = new MongoDB\Driver\Manager("mongodb+srv://food_delivery:contech%402021@food-delivery.3ukn0.mongodb.net/food_delivery?authSource=admin&replicaSet=atlas-o0xpuf-shard-0&w=majority&readPreference=primary&appname=MongoDB%20Compass&retryWrites=true&ssl=true");
		$query = new MongoDB\Driver\Query([]);
		$filter = ['id' => '0'];
		$query = new \MongoDB\Driver\Query($filter);
		$cursor = $manager->executeQuery("food_delivery.agents",$query);
		$name = "";
		$phone = "";
		$address = "";
		$preference = "";
		session_start();
		$email = $_SESSION["customer_id"];
		foreach($cursor as $customer){
		    $name	 = $customer->name;
			$phone = $customer->phone;
			$address = $customer->address;
			$preference = $customer->preference;
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
		