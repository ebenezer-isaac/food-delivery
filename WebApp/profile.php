<?php
	require_once __DIR__ . '/vendor/autoload.php';
	session_start();
	$type = $_SESSION["customer_typ"];
	$manager = new MongoDB\Driver\Manager("mongodb+srv://food_delivery:contech%402021@food-delivery.3ukn0.mongodb.net/food_delivery?authSource=admin&replicaSet=atlas-o0xpuf-shard-0&w=majority&readPreference=primary&appname=MongoDB%20Compass&retryWrites=true&ssl=true");
	$query = new MongoDB\Driver\Query([]);
			    $name = "";
	if($type=="1"){
		$email = $_SESSION["customer_id"];
		$phone = "";
		$address = "";
		$preference = "";
		$filter = ['email' => $email];
		$query = new \MongoDB\Driver\Query($filter);
		$cursor = $manager->executeQuery("food_delivery.customers",$query);
		foreach($cursor as $customer){
			if(isset($customer->name)){$name = $customer->name;}
		    if(isset($customer->phone)){$phone = $customer->phone;}
			if(isset($customer->address)){$address = $customer->address;}
			if(isset($customer->preference)){$preference = $customer->preference;}
		}?>
		Profile
		<br><br>
		<table style='overflow: auto;'>
			<tr>
				<td style='text-align:left;' width = '20%'>Name</td>
				<td width = '5%'> : </td>
				<td style='text-align:left;'><input type="text" id= "name" name= "name" value= "<?php echo $name; ?> "size=30></td>
			</tr>
			<tr>
				<td style='text-align:left;'>Email</td>
				<td> : </td>
				<td style='text-align:left;'><input type="text" id= "email" name= "email" value= "<?php echo $email; ?> "size=30 disabled></td>
			</tr>
			<tr>
				<td style='text-align:left;'>Phone</td>
				<td> : </td>
				<td style='text-align:left;'><input type="text" id= "phone" name= "phone" value= "<?php echo $phone; ?>" size=30></td>
			</tr>
			<tr>
				<td style='text-align:left;'>Address</td>
				<td> : </td>
				<td style='text-align:left;'><textarea id= "address" name= "address" cols="33" rows="7"><?php echo $address;?></textarea></td>
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
		<input type="button" name= "update" value="Update" onclick='javascript:update_profile_details()'></p>
		<br><br>
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
			<input type="button" name= "update_pass" id="update_pass" value="Change" disabled="" onclick='javascript:update_password()'>
		<script>
			function checkPass(){
				if(document.getElementById('password_new').value==document.getElementById('password_con').value){
					document.getElementById('update_pass').disabled=false;
				}else{
					document.getElementById('update_pass').disabled=true;
			}
			function update_profile_details(id){
				var name = document.getElementById('name').value;
				var email = document.getElementById('email').value;
				var phone = document.getElementById('phone').value;
				var address = document.getElementById('address').value;
				$.ajax({
					url: "save_profile.php?name="+name+"&email="+email+"&phone="+phone+"&address="+address, 
					success: function(result){
						alert(result);
				}});
			}
		</script><?php
	}else if ($type=="2"){
		$id =$_SESSION["id"];
		$filter  = ['res_id' => $id];
	    $query = new \MongoDB\Driver\Query($filter);
	    $cursor = $manager->executeQuery("food_delivery.restaurants",$query);
	    foreach($cursor as $document){
	        $rest_id=$document->res_id;
	        $rest_rating=$document->rating;
	        $rest_name=$document->name;
	        $rest_address=$document->address;
	       ?>
		    <table style='overflow: auto;'>
		        <tr>
		            <td style='text-align:left;' width = '20%'>Restaurant Id</td>
		            <td width = '5%'> : </td>
		            <td style='text-align:left;'><?php echo $rest_id; ?> </td>
		        </tr>
		         <tr>
		            <td style='text-align:left;' width = '20%'>Restaurant Rating</td>
		            <td width = '5%'> : </td>
		            <td style='text-align:left;'><?php echo $rest_rating; ?> </td>
		        </tr>
		        <tr>
		            <td style='text-align:left;' width = '20%'>Name</td>
		            <td width = '5%'> : </td>
		            <td style='text-align:left;'><input type="text" name= "name" id= "name" value= "<?php echo $rest_name; ?> "size=30></td>
		        </tr>
		        <tr>
		            <td style='text-align:left;' width = '20%'>Address</td>
		            <td width = '5%'> : </td>
		            <td style='text-align:left;'><textarea name= "address" id='address' cols="33" rows="7"><?php echo $rest_address; ?></textarea></td>
		        </tr>
		    </table>
	    	<input type="button" name= "update" value="Update" onclick='javascript:update_profile_details()'></p>
			<script>
				function update_profile_details(id){
					var name = document.getElementById('name').value;
					var address = document.getElementById('address').value;
					alert("save_profile.php?name="+name+"&address="+address);
					$.ajax({
						url: "save_profile.php?name="+name+"&address="+address, 
						success: function(result){
							alert(result);
					}});
				}
			</script>
		<?php
		}
	}
?>
