<?php
require_once('config.php');
$cuisine = $_GET['cuisine'];
$cat = $_GET['cat'];
$taste = $_GET['taste'];
$search_text = $_GET['search_text'];
$query="select restaurant_dishes.restaurant_id as res_id, restaurants.name as res_name, restaurants.rating, restaurants.address,  restaurant_dishes.dish_id, restaurant_dishes.category, restaurant_dishes.cuisine, restaurant_dishes.name, restaurant_dishes.taste, restaurant_dishes.pic, restaurant_dishes.price from restaurant_dishes inner join restaurants on restaurant_dishes.restaurant_id = restaurants.restaurant_id where restaurant_dishes.name LIKE '%$search_text%' and restaurant_dishes.category LIKE '%$cat%' and restaurant_dishes.cuisine LIKE '%$cuisine%' and restaurant_dishes.taste LIKE '%$taste%' order by price";
$result=mysqli_query($conn,$query) or trigger_error(mysqli_error($conn));
if($row=mysqli_fetch_assoc($result)){
    while($row=mysqli_fetch_assoc($result)){
		$res_id=$row['res_id'];
    	$res_nam=$row['res_name'];
        $res_rat=$row['rating'];
        $res_add=$row['address'];
        $dish_id=$row["dish_id"];
        $dish_cat=$row['category'];
        $dish_cui=$row['cuisine'];
        $dish_nam=$row['name'];
        $dish_taste=$row['taste'];
        $dish_pic=$row['pic'];
        $dish_prc=$row['price'];?>
		<div class='col-xl-4 col-sm-6 mb-3' align='center'>
			<?php 
				if((string)$dish_cat=="V"){
					echo "<div class='card text-white bg-success o-hidden h-100'>";
				}else{
					echo "<div class='card text-white bg-danger o-hidden h-100'>";
				}
			?>
				<a class='card-header text-white clearfix'>
					<span class='float-middle'>
						<?php echo (string)$dish_nam." (".(string)$dish_cat.")"; ?>
						<br>
						<?php echo (string)$res_nam." (".(string) $res_rat.")"; ?>
					</span>
				</a>
				<div class='card-body'>
					<div class='card-body-icon'>
						<?php 
							#echo "<script>alert(".(string)$restaurant->dish_cat.");</script>";
							if((string)$dish_cat=="V"){
								echo "<i class='fas fa-seedling'></i>";
							}else{
								echo "<i class='fas fa-bone'></i>";
							}
						?>
					</div>
					<div class='mr-2 fill' align='center'>
                        <img src='images/dishes/<?php echo $dish_pic;?>'>
                    </div>
                </div>
                <a class='card-footer text-white clearfix small z-1' 
                href="javascript:setContent('/restaurant?res_id=<?php echo $res_id; ?>');" >
                    <span class='float-left'><?php echo (string)$res_add; ?></span>
                    <span class='float-right'>
                        <?php echo "Rs.".(string)$dish_prc; ?><i class='fas fa-angle-right'></i>
                    </span>
				</a>
			</div>
		</div><?php
	}
}?>


