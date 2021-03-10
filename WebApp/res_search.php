<?php
if(isset($_GET["search"])){
	$search_text = $_GET["search"];
	//echo"<script>alert('$search_text')</script>";
	//$conn = mysqli_connect("sql290.main-hosting.eu","u117204720_food_club","5\$pANyPa^APH","u117204720_food_club");
	//if (mysqli_connect_errno()) {
	//  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	//  exit();
	
	require_once 'vendor/autoload.php';
	$manager = new MongoDB\Driver\Manager("mongodb+srv://food_delivery:contech%402021@food-delivery.3ukn0.mongodb.net/food_delivery?authSource=admin&replicaSet=atlas-o0xpuf-shard-0&w=majority&readPreference=primary&appname=MongoDB%20Compass&retryWrites=true&ssl=true");
	$query = new MongoDB\Driver\Query([]);
	$filter	  = ['name' => $search_text];
	$options = [];
	$query = new \MongoDB\Driver\Query($filter, $options);
	$cursor = $manager->executeQuery("food_delivery.restaurants",$query);
	//$sql = "SELECT *FROM restaurants WHERE name LIKE '%$search_text%'";
	//$result = $conn->query($sql);
		foreach($cursor as $document) {?>
			<div class='col-xl-12 col-sm-12 mb-3' align='center'>
				<div class='card text-white bg-primary o-hidden h-100'>
					<a class='card-header text-white clearfix'>
						<span class='float-middle'>
							<?php echo $document->name; ?>
						</span>
					</a>
					<div class='card-body'>
						<div class='card-body-icon'>
			            	<i class="fas fa-utensils"></i>
						</div>
						<div class='mr-2' align='center'>
							<?php echo $document->address;?>
						</div>
					</div>
					<a class='card-footer text-white clearfix small z-1' 
					href="javascript:setContent('restaurant.php?res_id=<?php echo $document->res_id?>');" >
						<span class='float-left'>
							<?php echo "Rating : ",$document->rating; ?>
						</span>
						<span class='float-right'>
							<i class='fas fa-angle-right'></i>
						</span>
					</a>
				</div>
			</div><?php
		}
}
	//$conn->close();
?>