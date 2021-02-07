<?php
date_default_timezone_set("Asia/Calcutta");
session_start();
if (isset($_SESSION["customer_id"])) {
    echo "Popular Dishes";
	function search_in_array($value, $array){
		$index = 0;
		foreach ($array as $dish) {
			if((trim(strtolower((string)$dish))== trim(strtolower($value)))){
				return $index;
			}else{
				$index = $index +1;
			}
		}
		return -1;
	}

	$i=0;
	$dish_freq = array(array());
	$xml_history = simplexml_load_file("./database/history.xml");
	$dish_freq[0][0]="dish_00002";
	foreach($xml_history->order as $order){
		foreach ($order->dishes->dish as $dish) {	
			if ($i==0){
				$dish_freq[0][0] = (string)$dish->dish_id;
				$dish_freq[0][1] = (string)$dish->quantity;
				$i+=1;
			 }else{
			 	if(search_in_array((string)$dish->dish_id, array_column($dish_freq, 0))>=0){ 
			 		$index = search_in_array((string)$dish->dish_id,array_column($dish_freq, 0));
					$dish_freq[$index][1] = (int)$dish->quantity+(int)$dish_freq[$index][1];
				}else{     
					$dish_freq[$i][0] = (string)$dish->dish_id;
					$dish_freq[$i][1] = (string)$dish->quantity;
					$i+=1;
					
				}
			 }
		}
	}
	
	function qsort($dish_freq){
		for($i = 0; $i<count($dish_freq);$i++){
			for($j = 0; $j<count($dish_freq)-1;$j++){
				if((int)$dish_freq[$j][1]<(int)$dish_freq[$j+1][1]){
					$temp1=$dish_freq[$j+1][0];
					$temp2=(int)$dish_freq[$j+1][1];
					$dish_freq[$j+1][0]=$dish_freq[$j][0];
					$dish_freq[$j+1][1]=(int)$dish_freq[$j][1];
					$dish_freq[$j][0]=$temp1;
					$dish_freq[$j][1]=(int)$temp2;
				}
			}
		}
		return $dish_freq;
	}

	function getDishDetails($dishid){
		$xml = simplexml_load_file("./database/restaurants.xml");
		foreach ($xml->restaurant as $restaurant) {
			$res_name = (string)$restaurant->name;
			$res_rating = (string)$restaurant->rating;
			$res_id = (string)$restaurant->id;
			$res_address = (string)$restaurant->address;
			foreach ($restaurant->dishes->dish as $dish) {
				if (trim(strtolower((string)$dish->dish_id)) == trim(strtolower((string)$dishid))){
					$dish_details = array();
					$dish_details["res_id"] = (string)$res_id;
					$dish_details["res_name"] = (string)$res_name;
					$dish_details["res_rating"] = (string)$res_rating;
					$dish_details["res_address"] = (string)$res_address;
					$dish_details["dish_id"] = (string)$dish->dish_id;
					$dish_details["dish_name"] = (string)$dish->dish_name;
					$dish_details["dish_cat"] = (string)$dish->dish_cat;
					$dish_details["dish_pic"] = (string)$dish->dish_pic;
					$dish_details["dish_price"] = (string)$dish->price;
					return $dish_details;
				}
			}
		}
	}

	$dish_freq = qsort($dish_freq);
	echo "<br><br><div class='row'>";
	$dish_count = count($dish_freq);
	$limit = 9;
	if(count($dish_freq)<9){
		$limit = count($dish_freq);
	}
	for($i = 0; $i<$limit;$i++){
		$dish_details = getDishDetails($dish_freq[$i][0]);
		?>
		<div class='col-xl-3 col-sm-3 mb-3' align='center'>
			<?php 
				if((string)$dish_details["dish_cat"]=="Veg"){
					echo "<div class='card text-white bg-success o-hidden h-100'>";
				}else{
					echo "<div class='card text-white bg-danger o-hidden h-100'>";
				}
			?>
				<a class='card-header text-white clearfix'>
					<span class='float-middle'>
						<?php echo (string)$dish_details["dish_name"]; ?>
						<br>
						
					</span>
				</a>
				<div class='card-body'>
					<div class='card-body-icon'>
						<?php 
							if((string)$dish_details["dish_cat"]=="Veg"){
								echo "<i class='fas fa-seedling'></i>";
							}else{
								echo "<i class='fas fa-bone'></i>";
							}
						?>
					</div>
					<div class='mr-2 fill' align='center'>
						<?php echo "<img src='images/dishes/".(string)$dish_details["dish_pic"]."' height=70% width=70%>";?>
					</div>
				</div>
				<a class='card-footer text-white clearfix small z-1' 
				href="javascript:setContent('restaurant?id=<?php echo (string)$dish_details["res_id"]; ?>&dishid=<?php echo (string)$dish_details["dish_id"]; ?>' );" >
					<span class='float-left'><?php echo (string)$dish_details["res_name"]
					." ( ".(string)$dish_details["res_rating"]." )"; ?></span>
					<span class='float-right'>
						<?php echo "Rs.".(string)$dish_details["dish_price"]; ?><i class='fas fa-angle-right'></i>
					</span>
				</a>
			</div>
		</div>
		<?php
	}
	echo "</div>";
} else {
    echo "<script>window.location.replace('index.php');</script>";
}


