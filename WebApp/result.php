<?php
$search_text = $_GET['search'];
if(strlen($search_text)>0){
	$xml = simplexml_load_file("./database/restaurants.xml");
	foreach ($xml->restaurant as $restaurant) {
		// echo $restaurant->name."<br>";
		foreach ($restaurant->dishes->dish as $dish) {
			// echo $dish."<br>";
			// echo "xml : ".trim(strtolower((string)$dish->dish_name));
			// echo "<br>text : ".trim(strtolower($search_text));
			if (strpos(trim(strtolower((string)$dish->dish_name)), trim(strtolower($search_text))) !== false){?>
				<div class='col-xl-4 col-sm-6 mb-3' align='center'>
					<?php 
					#echo "<script>alert(".(string)$restaurant->dish_cat.");</script>";
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
								<?php echo (string)$restaurant->name." (".(string)$restaurant->rating.")"; ?>
							</span>
						</a>
						<div class='card-body'>
							<div class='card-body-icon'>
				            	<i class="fas fa-utensils"></i>
							</div>
							<div class='mr-2' align='center'>
								<?php echo "<img src='".(string)$dish->dish_pic."'>";?>
							</div>
						</div>
						<br><br>
						<a class='card-footer text-white clearfix small z-1' 
						href="javascript:setContent('/restaurant?id="+ <?php echo (string)$restaurant->id; ?> + 
													"&dishid=" + <?php echo (string)$restaurant->id; ?> + "' );" >
							<span class='float-left'><?php echo (string)$restaurant->address; ?></span>
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
}
