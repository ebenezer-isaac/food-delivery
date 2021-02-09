<?php
if(isset($_GET["search"])){
	$search_text = $_GET["search"];
	$conn = mysqli_connect("sql290.main-hosting.eu","u117204720_food_club","5\$pANyPa^APH","u117204720_food_club");
	if (mysqli_connect_errno()) {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  exit();
	}
	$sql = "SELECT *FROM restaurants WHERE name LIKE '%$search_text%'";
	$result = $conn->query($sql);
	if ($result) {
		while($res = $result->fetch_assoc()) {?>
			<div class='col-xl-12 col-sm-12 mb-3' align='center'>
				<div class='card text-white bg-primary o-hidden h-100'>
					<a class='card-header text-white clearfix'>
						<span class='float-middle'>
							<?php echo $res["name"]; ?>
						</span>
					</a>
					<div class='card-body'>
						<div class='card-body-icon'>
			            	<i class="fas fa-utensils"></i>
						</div>
						<div class='mr-2' align='center'>
							<?php echo $res["address"];?>
						</div>
					</div>
					<a class='card-footer text-white clearfix small z-1' 
					href="javascript:setContent('/restaurant?res_id=<?php echo $res["restaurant_id"];?>');" >
						<span class='float-left'>
							<?php echo "Rating : ".$res["rating"]; ?>
						</span>
						<span class='float-right'>
							<i class='fas fa-angle-right'></i>
						</span>
					</a>
				</div>
			</div><?php
		}
	}
	$conn->close();
}?>