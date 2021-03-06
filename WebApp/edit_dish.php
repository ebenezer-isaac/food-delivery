<style>
	.img_display{
		border: solid black 1px ;
	}
</style>
<script>
	function update_dish_details(id){
		var name = document.getElementById('dish_'+id+'_name').value;
		var category = document.getElementById('dish_'+id+'_category').value;
		var cuisine = document.getElementById('dish_'+id+'_cuisine').value;
		var taste = document.getElementById('dish_'+id+'_taste').value;
		var price = document.getElementById('dish_'+id+'_price').value;
		$.ajax({
			url: "save_dish.php?type=update&id="+id+"&name="+name+"&category="+category+"&cuisine="+cuisine+"&taste="+taste+"&price="+price, 
			success: function(result){
				alert(result);
		}});
	}
	function delete_dish(id){
		$.ajax({
			url: "del_dish.php?id="+id, 
			success: function(result){
				alert(result);
		}});
	}
</script>
<?php
	require_once 'vendor/autoload.php';
	$manager = new MongoDB\Driver\Manager("mongodb+srv://food_delivery:contech%402021@food-delivery.3ukn0.mongodb.net/food_delivery?authSource=admin&replicaSet=atlas-o0xpuf-shard-0&w=majority&readPreference=primary&appname=MongoDB%20Compass&retryWrites=true&ssl=true");
	$query = new MongoDB\Driver\Query([]);
	session_start();
	$id =$_SESSION["id"];
	$filter	  = ['res_id' => $id];
	$query = new \MongoDB\Driver\Query($filter);
	$cursor = $manager->executeQuery("food_delivery.dishes",$query);
	foreach($cursor as $document){?>
		<div class='card text-white bg-primary o-hidden h-100'>
			<div class='card-body'>
				<div class='card-body-icon'>
	            	<i class="fas fa-utensils"></i>
				</div>
				<div class='mr-2' align='center'>
					<div class='card'>
						<div class='card-header' style='color:black;'>
							Dish Details (Dish ID : <?php echo $document->dish_id;?>)
						</div>
						<div class='card-body'>
							<div class='row'>
								<div class='col-sm-12 col-md-4'>
									<img class='img_display' src='images/dishes/<?php echo $document->pic;?>' >
								</div>
								<div class='col-sm-12 col-md-8'>
								<?php
									echo "<table style='color:black' width='100%;overflow: auto;'>";
									echo "<tr><td style='text-align:left;' width = '20%'>Name</td><td width = '5%'> : </td>
									<td style='text-align:left;'><input type='text' id='dish_".$document->dish_id."_name' value='".$document->name."'></tr>";
									echo "<tr><td style='text-align:left;' width = '20%'>Category</td><td width = '5%'> : </td>
									<td style='text-align:left;'>";?>
									<select id='dish_<?php echo $document->dish_id;?>_category'>
										<option <?php if($document->category=="V") {echo "selected";}?> value="V">Veg</option>
										<option <?php if($document->category=="N") {echo "selected";}?> value="N">Non Veg</option>
									</select></tr><?php
									echo "<tr><td style='text-align:left;' width = '20%'>Cuisine</td><td width = '5%'> : </td>
									<td style='text-align:left;'><input type='text' id='dish_".$document->dish_id."_cuisine' value='".$document->cuisine."'></tr>";
									echo "<tr><td style='text-align:left;' width = '20%'>Taste</td><td width = '5%'> : </td>
									<td style='text-align:left;'><input type='text' id='dish_".$document->dish_id."_taste' value='".$document->taste."'></tr>";
									echo "<tr><td style='text-align:left;' width = '20%'>Price</td><td width = '5%'> : </td>
									<td style='text-align:left;'><input type='number' id='dish_".$document->dish_id."_price' value='".$document->price."'></tr></table>";

								?>
								</div>
							</div>
							<br>
							<input type='button' value='Update' onclick='javascript:update_dish_details(<?php echo $document->dish_id;?>)'>
							<input type='button' value='Delete' onclick='javascript:delete_dish(<?php echo $document->dish_id;?>)'>
						</div>
						<div class='card-footer small text-muted'>
					   		<?php ?>
						</div>
					</div>
				</div>
			</div>
		</div><br>
<?php
	}
?>

