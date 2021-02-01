<?php
$page = "Organizer profile";
#include "logger.php";
date_default_timezone_set("Asia/Calcutta");
session_start();
if (isset($_SESSION["customer_id"])) {
	$xml = simplexml_load_file("./database/profile.xml");
	$history=simplexml_load_file("./database/history.xml");
	foreach ($xml->customer as $customer) {
		if($_SESSION["customer_id"] == (string)$customer->customerid){?>
		    <font size=5><b><?php echo (string)$customer->name; ?></b></font>
		    <br><br>
		    <?php 
		    $counter=0;
		    foreach($customer->history->orderid as $orderid){
				foreach($history->order as $order){
					if((string)$order->order_id == $orderid){$total=0;?>
						<div class='col-xl-12 col-sm-12 mb-3' align='center'>
							<?php
								if((string)$order->delivery_status=="On The Way"){
									echo "<div class='card text-white bg-warning o-hidden h-100'>";
								}elseif((string)$order->delivery_status=="Delivered"){
									echo "<div class='card text-white bg-success o-hidden h-100'>";
								}elseif((string)$order->delivery_status=="Cancelled"){
									echo "<div class='card text-white bg-danger o-hidden h-100'>";
								}
							?>
								<a class='card-header text-white clearfix'>
									<span class='float-left'>
										<?php echo "OrderID : ".(string)$order->order_id; ?>
									</span>
									<span class='float-right'>
										<?php echo "Date and Time : ".date("d/m/Y h:m:s a", strtotime((string)$order->date." ".(string)$order->time)); ?>
									</span>
									<span class='float-middle'>
										<?php echo "RestaurantID : ".(string)$order->restaurant_id; ?>
									</span>
								</a>
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
																<th>Quantity</th>
																<th>Price</th>
																<th>Total</th>
															<tr>
														</thead>
														<?php
															foreach ($order->dishes->dish as $dish) {
																echo "<tr>";
																echo "<td>".$dish->dish_id."</td>";
																echo "<td>".$dish->quantity."</td>";
																echo "<td>".$dish->dishprice."</td>";
																$total = $total + (float)$dish->quantity * (float)$dish->dishprice;
																echo "<td>".(float)$dish->quantity * (float)$dish->dishprice."</td>";
																echo "</tr>";
															}
														?>
													</table>
												</div>
											</div>
											<div class='card-footer small text-muted'>
										   		<b><?php echo "Total Amount : Rs.".$total;?></b>
											</div>
										</div>
									</div>
								</div>
								<div class='card-footer text-white clearfix small z-1' >
									<span class='float-left'>
										<?php echo "Delivery Address : ".(string)$order->delivery_address; ?>
									</span>
									<span class='float-right'>
										<?php echo "Delivery Address : ".(string)$order->agent_id; ?>
									</span>
								</div>
							</div>
						</div><br>
						<?php	
					}
				}
		    	$counter = $counter +1;
			}
		}
	}
}
?>


