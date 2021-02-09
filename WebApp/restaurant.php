<?php
if(isset($_GET['res_id'])){
	$res_id = $_GET['res_id'];
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
										#echo "<script>alert(".(string)$restaurant->dish_cat.");</script>";
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
							<a class='card-footer text-white clearfix small z-1' 
							href="javascript:setContent('/restaurant?id=1');" >
								<span class='float-right'>
									<?php echo "Rs.".(string)$dish["price"]; ?><i class='fas fa-angle-right'></i>
								</span>
							</a>
						</div>
					</div><?php
				}
				echo "</div>";	
			}
		}
	}
	$conn->close();
}else{
	echo "<script>setContent('restaurants.php');</script>";
}
