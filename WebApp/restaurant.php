<?php
if(isset($_GET['res_id'])){
	$res_id = $_GET['res_id'];
	if(!isset($_COOKIE["res_id"])){
		echo "cookie not set";
		header("Set-Cookie: res_id=$res_id");
		header("Set-Cookie: cart_obj={};");
		echo '<script>document.cookie = "cart_obj={}";document.cookie = "res_id='.$res_id.'";</script>';
		echo "<script>window.location.replace('main.php?url=restaurant.php?res_id=$res_id');</script>";
	}else{
		if($_COOKIE["res_id"]==$_GET['res_id']){?>
			<script>
				var cart_obj = {};
				var res_id="";
				if (this.document.cookie.length != 0) {
		            var cart_array = document.cookie.split(";");
			        for(var i = 0; i <cart_array.length; i++) {
			            if(cart_array[i].trim().startsWith("cart_obj",0)){
			                cart_array[i] = cart_array[i].replace("cart_obj=","");
			                cart_array[i] = cart_array[i].replaceAll("'","\"");
			                cart_obj = JSON.parse(cart_array[i]);
			            }else if(cart_array[i].trim().startsWith("res_id",0)){
		                cart_array[i] = cart_array[i].replace("res_id=","");
		                res_id = parseInt(cart_array[i]);
		            	}
			        }
		        }
		    </script>
			<style>
				input[type=number]::-webkit-inner-spin-button, 
				input[type=number]::-webkit-outer-spin-button { 
			    	opacity: 1;
				}
			</style>
			<script>
				function add_to_cart(quantity, dish_id){
					cart_obj[""+String(dish_id)]=quantity;
			        var jsonString = JSON.stringify(cart_obj);
			        document.cookie = "cart_obj=" + jsonString + ";expires=Wed, 12 May 2021 01:00:00 UTC;";
			    }
			</script>
			<?php
			$servername = "sql290.main-hosting.eu";
			$username = "u117204720_food_club";
			$password = "5\$pANyPa^APH";
			$dbname = "u117204720_food_club";
			$conn = new mysqli($servername, $username, $password, $dbname);
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}
			$sql="SELECT * FROM restaurants WHERE restaurant_id=$res_id";
			$result1 = $conn->query($sql);
			if($result1){
				while($res = $result1->fetch_assoc()){
					$res_name = $res["name"];
					$res_rating = $res["rating"];
					$res_address = $res["address"];
				
					$sql="SELECT * FROM restaurant_dishes WHERE restaurant_dishes.restaurant_id=$res_id";
					$result2 = $conn->query($sql);
					if($result2){
						echo "$res_name ($res_rating)<br>$res_address<br><br><div class='row'>";
						while($dish = $result2->fetch_assoc()){?>
							<div class='col-xl-4 col-sm-6 mb-3' align='center'>
								<?php 
									$dish_cat = "Veg";
									if($dish["category"]=="V"){
										echo "<div class='card text-white bg-success o-hidden h-100'>";
									}else{
										$dish_cat = "Non Veg";
										echo "<div class='card text-white bg-danger o-hidden h-100'>";
									}
								?>
									<a class='card-header text-white clearfix'>
										<span class='float-middle'>
											<?php 
												echo $dish["name"]." (".(string)$dish_cat.")"; ?>
											<br>
											
										</span>
									</a>
									<div class='card-body'>
										<div class='card-body-icon'>
											<?php 
												if((string)$dish_cat=="Veg"){
													echo "<i class='fas fa-seedling'></i>";
												}else{
													echo "<i class='fas fa-bone'></i>";
												}
											?>
										</div>
										<div class='mr-2 fill' align='center'>
											<?php echo "<img src='images/dishes/".(string)$dish->dish_pic."'>";?>
										</div>
									</div>
									<div class='card-footer text-white clearfix small z-1'>
										<span class='float-left'>
											Quantity : <input type="number" name="dish_<?php echo $dish["dish_id"]; ?>" id="dish_<?php echo $dish["dish_id"]; ?>" min=0 max=10 step =1 style="width:40px" value=0 onchange="javascript:add_to_cart(this.value, <?php echo $dish["dish_id"]; ?>)">
										</span>
										<span class='float-right'>
											<?php echo "Rs.".(string)$dish["price"]; ?><i class='fas fa-angle-right'></i>
										</span>
									</div>
								</div>
							</div><?php
						}
						echo "</div>";
					}
				}
			}
			$conn->close();
			if(isset($_COOKIE["cart_obj"])){?>
				<script>
					for(var dish in cart_obj){
						document.getElementById("dish_"+dish).value=cart_obj[""+dish];
					}	
				</script><?php	
			}
        }else{
			header("Set-Cookie: res_id=$res_id");
			header("Set-Cookie: cart_obj={};");
			echo '<script>document.cookie = "cart_obj={}";document.cookie = "res_id='.$res_id.'";</script>';
			echo "<script>window.location.replace('main.php?url=restaurant.php?res_id=$res_id');</script>";
        }
	}
}else{
	echo "<script>setContent('restaurants.php');</script>";
}
