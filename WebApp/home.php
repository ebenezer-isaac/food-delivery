<?php
date_default_timezone_set("Asia/Calcutta");
session_start();
if (isset($_SESSION["customer_id"])) {
    echo "Home Page";
    ?>

	<?php
	$i=0;
	$dish_freq = array(array());
	$xml_history = simplexml_load_file("./database/history.xml");
	foreach($xml_history->order as $order)
	{
		foreach ($order->dishes->dish as $dishid) {			
			if(! in_array($dishid->dish_id, $dish_freq))
			{
				$dish_freq[$i][0] = $dishid->dish_id;
				$dish_freq[$i][1] = $dishid->quantity;
			}
			if(in_array($dishid->dish_id, $dish_freq))
			{
				$no = array_search($dishid->$dish,$dish_freq);
				$dish_freq[$no][1] = ($dishid->quantity)+($dish_freq[$no][1]);
			}
			$i+=1;		
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
	echo "<br><br><br><br><div class='row'>";
	for($i = 0; $i<9;$i++){
		$dish_details = getDishDetails($dish_freq[$i][0]);
		?>
		<div class='col-xl-4 col-sm-6 mb-3' align='center'>
			<?php 
				if((string)$dish_details["dish_cat"]=="Veg"){
					echo "<div class='card text-white bg-success o-hidden h-100'>";
				}else{
					echo "<div class='card text-white bg-danger o-hidden h-100'>";
				}
			?>
				<a class='card-header text-white clearfix'>
					<span class='float-middle'>
						<?php echo (string)$dish_details["dish_name"]." (".(string)$dish_details["dish_cat"].")"; ?>
						<br>
						<?php echo (string)$dish_details["res_name"]." (".(string)$dish_details["res_rating"].")"; ?>
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
						<?php echo "<img src='images/dishes/".(string)$dish_details["dish_pic"]."'>";?>
					</div>
				</div>
				<a class='card-footer text-white clearfix small z-1' 
				href="javascript:setContent('restaurant?id=<?php echo (string)$dish_details["res_id"]; ?>&dishid=<?php echo (string)$dish_details["dish_id"]; ?>' );" >
					<span class='float-left'><?php echo (string)$dish_details["res_address"]; ?></span>
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


