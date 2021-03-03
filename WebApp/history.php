<?php
session_start();
	require_once _DIR_ . '/vendor/autoload.php';
	try {
	    $manager = new MongoDB\Driver\Manager("mongodb+srv://food_delivery:contech%402021@food-delivery.3ukn0.mongodb.net/food_delivery?authSource=admin&replicaSet=atlas-o0xpuf-shard-0&w=majority&readPreference=primary&appname=MongoDB%20Compass&retryWrites=true&ssl=true");
		$query = new MongoDB\Driver\Query([]);
		}
		catch(Exception $e){
		echo $e;
	}		
$email_id=$_SESSION["customer_id"];
$servername = "sql290.main-hosting.eu";
$username = "u117204720_food_club";
$password = "5\$pANyPa^APH";
$dbname = "u117204720_food_club";
echo "<font size=5><b>$email_id;</b></font><br><br>";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql="SELECT orders.order_id,orders.restaurant_id,restaurants.name as rest_name,restaurants.rating,restaurants.address,orders.date_time,orders.delivery_address,orders.status,orders.feedback,orders.agent_id from orders inner join restaurants on orders.restaurant_id=restaurants.restaurant_id where orders.email='$email_id' order by orders.date_time desc";
$result = $conn->query($sql);
if($result){
	while($row=$result->fetch_assoc()){
		$total = 0;
		$or_id=$row["order_id"];?>
		
		<div class='col-xl-12 col-sm-12 mb-3' align='center'>
			<?php
				if($row["status"]=="O"){
					echo "<div class='card text-white bg-warning o-hidden h-100'>";
				}elseif($row["status"]=="D"){
					echo "<div class='card text-white bg-success o-hidden h-100'>";
				}elseif($row["status"]=="C"){
					echo "<div class='card text-white bg-danger o-hidden h-100'>";
				}
			?>
				<div class='card-header text-white clearfix' style='text-align:left'>
					<?php 
						echo "<div class='table-responsive'><table width='100%' style='overflow: auto;'>";
						echo "<tr><td style='text-align:left;' width='25%'>OrderID</td><td width='5%'> : </td><td style='text-align:left;'>".sprintf('%05d',$or_id)."</td></tr>";
						echo "<tr><td style='text-align:left;' >Date and Time</td><td> : </td><td style='text-align:left;'>".$row["date_time"]."</td></tr>";
						echo "<tr><td style='text-align:left;'>Restaurant</td><td> : </td><td style='text-align:left;'>".$row["rest_name"]."</td></tr>";
						echo "<tr><td style='text-align:left;'>Despatch Address</td><td> : </td><td style='text-align:left;'>".$row["address"]."</td></tr>";
						echo "<tr><td style='text-align:left;'>Delivery Address</td><td> : </td><td style='text-align:left;'>".$row["delivery_address"]."</td></tr>";
						echo "<tr><td style='text-align:left;'>Order Status</td><td> : </td><td style='text-align:left;'>".$row["status"]."</td></tr>";
						echo "<tr><td style='text-align:left;'>Feedback</td><td> : </td><td style='text-align:left'>".$row["feedback"]."</td></tr></table></div>";
						$agent_id=$row["agent_id"];
					?>
				</div>
				<div class='card-body'>
					<div class='card-body-icon'>
		            	<i class="fas fa-utensils"></i>
					</div>
					<div class='mr-2' align='center'>
						<div class='card'>
							<div class='card-header' style='color:black;'>
								Order Details
							</div>
							<div class='card-body'>
								<div class='table-responsive'>
									<style>
										tr{vertical-align : middle;text-align:center;}
										th{vertical-align : middle;text-align:center;}
										td{vertical-align : middle;text-align:center;}
									</style>
									<table class='table table-bordered table-hover' width='100%' cellspacing='0'>
										<thead>
											<tr>
												<th>Dish</th>
												<th>Category</th>
												<th>Quantity</th>
												<th>Price</th>
												<th>Total</th>
											<tr>
										</thead>
										<?php 
											$sql1="SELECT ordered_dishes.dish_id,restaurant_dishes.name as dish_name,restaurant_dishes.category,ordered_dishes.price,ordered_dishes.quantity FROM ordered_dishes inner join restaurant_dishes on restaurant_dishes.dish_id=ordered_dishes.dish_id WHERE ordered_dishes.order_id=$or_id GROUP BY ordered_dishes.dish_id";
											$result1=$conn->query($sql1);
											if($result1){
												while($row1=$result1->fetch_assoc()){
													echo "<tr>";
													echo "<td>".$row1["dish_name"]."</td>";
													echo "<td>".$row1["category"]."</td>";
													echo "<td>".$row1["price"]."</td>";
													echo "<td>".$row1["quantity"]."</td>";
													$amount = (float)$row1["quantity"] * (float)$row1["price"];
													$total = $total + $amount;
													echo "<td>$amount</td>";
													echo "</tr>";
												}
											}
										?>
										<tfoot>
											<th colspan="4">Grand Total</th>
											<th><?php echo $total; ?></th>
										</tfoot>
									</table>
								</div>
							</div>
							<div class='card-footer small text-muted'>
						   		<?php 
						   			try
										{
											$filter = ['id' => $agent_id];
											$query = new \MongoDB\Driver\Query($filter);
											$cursor = $manager->executeQuery("food_delivery.agent",$query);
											foreach($cursor as $document){
											    echo "Delivery Agent Name   	 : ".$document->name<br>;
											    echo "Delivery Agent Phone Number:".$document->phone<br>;
											    echo "Join Date                	 : ".$document->joindate<br>;
											    echo "Vehicle Number 			 :".$document->vehicle_no<br>;
											    echo "Vehicle Model 			 :".$document->vehicle_model<br>;
										}
										catch(Exception $e){
											echo $e;
										}
								?>
							</div>
						</div>
					</div>
				</div>
				<div class='card-footer text-white clearfix small z-1' >
				</div>
			</div>
		</div><br>
	
