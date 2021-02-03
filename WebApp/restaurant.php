<?php
if(isset($_GET['dishid'])){
	$id = $_GET['id'];
	if(isset($_GET['dishid'])){
		$dish_id = $_GET['dishid'];	
	}
	if(strlen((string)$id)==5){
		$xml = simplexml_load_file("./database/restaurants.xml");
		foreach ($xml->restaurant as $restaurant) {
			if (strpos(trim(strtolower((string)$restaurant->id)), trim(strtolower($id))) !== false){
				echo (string)$restaurant->name." (".(string)$restaurant->rating.")<br>".(string)$restaurant->address."<br><br><div class='row'>";
				foreach ($restaurant->dishes->dish as $dish) {?>
					<div class='col-xl-4 col-sm-6 mb-3' align='center'>
						<?php 
							if((string)$dish->dish_cat=="Veg"){
								echo "<div class='card text-white bg-success o-hidden h-100'>";
							}else{
								echo "<div class='card text-white bg-danger o-hidden h-100'>";
							}
						?>
							<a class='card-header text-white clearfix'>
								<span class='float-middle'>
									<?php echo (string)$dish->dish_name." (".(string)$dish->dish_cat.")"; ?>
									<br>
									
								</span>
							</a>
							<div class='card-body'>
								<div class='card-body-icon'>
									<?php 
										#echo "<script>alert(".(string)$restaurant->dish_cat.");</script>";
										if((string)$dish->dish_cat=="Veg"){
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
							href="javascript:setContent('/restaurant?id="+ <?php echo (string)$restaurant->id; ?> + 
														"&dishid=" + <?php echo (string)$restaurant->id; ?> + "' );" >
								<span class='float-right'>
									<?php echo "Rs.".(string)$dish->price; ?><i class='fas fa-angle-right'></i>
								</span>
							</a>
						</div>
					</div>
					<?php
				}
			}
		}
		echo "</div>";	
	}
}else{
	echo "<script>setContent('restaurants.php');</script>";
}