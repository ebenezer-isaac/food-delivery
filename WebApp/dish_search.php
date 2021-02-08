<?php
     
     require_once('config.php');
     ?>

<?php

$search_text = $_GET['search_text'];

if(strlen($search_text)>0){

	$query="select * from restaurant_dishes  where name LIKE '%$search_text%'";
$result=mysqli_query($conn,$query) or trigger_error(mysqli_error($conn));

if($row=mysqli_fetch_assoc($result))
  {
    while($row=mysqli_fetch_assoc($result))
    {
        $dish_nam=$row['name'];
        $dish_cat=$row['category'];
        $dish_res=$row['restaurant_id'];
        $dish_prc=$row['price'];

        
        $query1="select * from restaurants  where restaurant_id='$dish_res'";
        $result1=mysqli_query($conn,$query1) or trigger_error(mysqli_error($conn));
        $row1=mysqli_fetch_assoc($result1);
        $res_nam=$row1['name'];
        $res_rat=$row1['rating'];
        $res_add=$row1['address'];

			if (strpos(trim(strtolower((string)$dish_nam)), trim(strtolower($search_text))) !== false){
				?>
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
                                /*<?php echo "<img src='./dishes/".(string)$dish_pic."'>";?>*/
                            </div>
                        </div>
                        <a class='card-footer text-white clearfix small z-1' 
                        href="javascript:setContent('/restaurant?id="+ <?php echo (string)$dish_res; ?> + 
                                                    "&dishid=" + <?php echo (string)$dish_res; ?> + "' );" >
                            <span class='float-left'><?php echo (string)$res_add; ?></span>
                            <span class='float-right'>
                                <?php echo "Rs.".(string)$dish_prc; ?><i class='fas fa-angle-right'></i>
                            </span>
						</a>
					</div>
				</div>
				<?php
				}
			}
		}
	}
		?>


