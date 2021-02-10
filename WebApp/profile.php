<?php
$conn = mysqli_connect("sql290.main-hosting.eu","u117204720_food_club","5\$pANyPa^APH","u117204720_food_club");
session_start();
$email = $_SESSION["customer_id"];
$sql = "SELECT * FROM customer WHERE  email = '$email'";
$result = $conn->query($sql);
if($result){
	while($customer = $result->fetch_assoc()) {
		$name	 = $customer['name'];
		$email = $customer['email'];
		$phone = $customer['phone'];
		$address = $customer['address'];
		$preference = $customer['preference'];?>
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
		<?php
	}
}
$conn->close(); 
?>