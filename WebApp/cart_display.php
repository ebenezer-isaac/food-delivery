<?php
if(isset($_GET['res_id']) && isset($_GET['cart'])){
	$res_id = $_GET['res_id'];
	$cart = json_decode($_GET['cart']);
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
			$text = "";
			$quantity=[];
			if (is_array($cart) || is_object($cart)){
				foreach($cart as $key => $value) {
					$text = strval( $text).strval( $key).", ";
					$quantity[strval( $key)]=(int)strval( $value);
				}
			}else{
				echo "hey";
			}
			$text = substr($text, 0, -2);
			$sql="SELECT * FROM restaurant_dishes WHERE restaurant_dishes.dish_id IN ($text);";
			$result2 = $conn->query($sql);
			if($result2){
				$total = 0;?>
				<b>CART</b><br>
				<div class='card text-white bg-primary o-hidden h-100'>
				<div class='card-header text-white clearfix' style='text-align:left'>
					<?php echo "<div style='text-align:center'><br>$res_name ($res_rating)<br>$res_address</div><br><div class='row'>";?>
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
										</thead><?php 
										while($dish = $result2->fetch_assoc()){
											$dish_id = $dish["dish_id"];
												if($quantity[$dish_id]>0){
													$amount = (float)$quantity[$dish_id] * (float)$dish["price"];
													$total = $total + $amount;
													echo "<tr>";
													echo "<td>".$dish["name"]."</td>";
													echo "<td>".$dish["category"]."</td>";
													echo "<td>";?>
													<input type="number" name="dish_<?php echo $dish["dish_id"]; ?>" 
													id="dish_<?php echo $dish["dish_id"]; ?>" min=0 max=10 step =1 
													style="width:40px" value="<?php echo $quantity[$dish_id]?>"
													onchange="javascript:add_to_cart(this.value, <?php echo $dish["dish_id"]?>);change_price(<?php echo $dish["price"]?>, this.value, <?php echo $dish["dish_id"]?>);">
													<?php
													echo "</td>";
													echo "<td><div id='price_".$dish["dish_id"]."'>".$dish["price"]."</div></td>";
													echo "<td><div id='amount_".$dish["dish_id"]."'>".$amount."</div></td>";
													echo "</tr>";
												}
											}
										?>
										<tfoot>
											<th colspan="4">Grand Total</th>
											<th><div id='grand'><?php echo $total; ?></div></th>
										</tfoot>
									</table>
								</div>
							</div>
							<div class='card-footer small text-muted'>
								<p>All Orders are paid by Cash on Delivery. Please keep the payment amount ready.</p>
						   		<input type="submit" class='btn btn-primary' value="Confirm Order" onclick="javascript:window.location.replace('confirm_order.php')">
							</div>
						</div>
					</div>
				</div><?php
			}
		}
	}
	$conn->close();
}else{
	echo "Empty Cart";
}?>