<?php
error_reporting (E_ALL ^ E_NOTICE);

$search_text1 =$_GET['search1'];
$search_text2 =$_GET['search2'];
$search_text3 =$_GET['search3'];


if(strlen($search_text1) && strlen($search_text2) && strlen($search_text3) >0){
    $xml = simplexml_load_file("./database/restaurants.xml");
	foreach ($xml->restaurant as $restaurant) {
		foreach ($restaurant->dishes->dish as $dish) {
            if($restaurant->cuisine==$search_text1){ 
                  if($dish->dish_cat==$search_text2){
                    if($dish->dish_taste==$search_text3){

            ?>
				<div class='col-xl-4 col-sm-6 mb-3' align='center'>
					<?php 
						if((string)$dish->dish_cat=="Veg"){
							echo "<div class='card text-white bg-success o-hidden h-100'>";
						}else{
							echo "<div class='card text-white bg-danger o-hidden h-100'>";
						}
					?>
						<a class='card-header text-white clearfix'>
							<span class='float-middle'>
								<?php echo (string)$dish->dish_name." (".(string)$dish->dish_cat.")"; ?>
								<br>
								<?php echo (string)$restaurant->name." (".(string)$restaurant->rating.")"; ?>
							</span>
						</a>
						<div class='card-body'>
							<div class='card-body-icon'>
								<?php 
									#echo "<script>alert(".(string)$restaurant->dish_cat.");</script>";
									if((string)$dish->dish_cat=="Veg"){
										echo "<i class='fas fa-seedling'></i>";
									}else{
										echo "<i class='fas fa-bone'></i>";
									}
								?>
							</div>
							<div class='mr-2 fill' align='center'>
								<?php echo "<img src='images/dishes/".(string)$dish->dish_pic."'>";?>
							</div>
						</div>
						<a class='card-footer text-white clearfix small z-1' 
						href="javascript:setContent('/restaurant?id="+ <?php echo (string)$restaurant->id; ?> + 
													"&dishid=" + <?php echo (string)$restaurant->id; ?> + "' );" >
							<span class='float-left'><?php echo (string)$restaurant->address; ?></span>
							<span class='float-right'>
								<?php echo "Rs.".(string)$dish->price; ?><i class='fas fa-angle-right'></i>
							</span>
						</a>
					</div>
				</div>
				<?php
                 }
                }
            }
			}
		}
    }
    

    elseif(strlen($search_text1)>0 &&  strlen($search_text2)>0 && strlen($search_text3)==0){
        $xml = simplexml_load_file("./database/restaurants.xml");
        foreach ($xml->restaurant as $restaurant) {
            foreach ($restaurant->dishes->dish as $dish) {
                if($restaurant->cuisine==$search_text1){ 
                      if($dish->dish_cat==$search_text2){
                       
    
                ?>
                    <div class='col-xl-4 col-sm-6 mb-3' align='center'>
                        <?php 
                            if((string)$dish->dish_cat=="Veg"){
                                echo "<div class='card text-white bg-success o-hidden h-100'>";
                            }else{
                                echo "<div class='card text-white bg-danger o-hidden h-100'>";
                            }
                        ?>
                            <a class='card-header text-white clearfix'>
                                <span class='float-middle'>
                                    <?php echo (string)$dish->dish_name." (".(string)$dish->dish_cat.")"; ?>
                                    <br>
                                    <?php echo (string)$restaurant->name." (".(string)$restaurant->rating.")"; ?>
                                </span>
                            </a>
                            <div class='card-body'>
                                <div class='card-body-icon'>
                                    <?php 
                                        #echo "<script>alert(".(string)$restaurant->dish_cat.");</script>";
                                        if((string)$dish->dish_cat=="Veg"){
                                            echo "<i class='fas fa-seedling'></i>";
                                        }else{
                                            echo "<i class='fas fa-bone'></i>";
                                        }
                                    ?>
                                </div>
                                <div class='mr-2 fill' align='center'>
                                    <?php echo "<img src='./dishes/".(string)$dish->dish_pic."'>";?>
                                </div>
                            </div>
                            <a class='card-footer text-white clearfix small z-1' 
                            href="javascript:setContent('/restaurant?id="+ <?php echo (string)$restaurant->id; ?> + 
                                                        "&dishid=" + <?php echo (string)$restaurant->id; ?> + "' );" >
                                <span class='float-left'><?php echo (string)$restaurant->address; ?></span>
                                <span class='float-right'>
                                    <?php echo "Rs.".(string)$dish->price; ?><i class='fas fa-angle-right'></i>
                                </span>
                            </a>
                        </div>
                    </div>
                    <?php
                     }
                    }
                }
                }
            }
        
            elseif(strlen($search_text1)>0 &&  strlen($search_text2)==0 && strlen($search_text3)==0){
                $xml = simplexml_load_file("./database/restaurants.xml");
                foreach ($xml->restaurant as $restaurant) {
                    foreach ($restaurant->dishes->dish as $dish) {
                        if($restaurant->cuisine==$search_text1){ 
                              
                               
            
                        ?>
                            <div class='col-xl-4 col-sm-6 mb-3' align='center'>
                                <?php 
                                    if((string)$dish->dish_cat=="Veg"){
                                        echo "<div class='card text-white bg-success o-hidden h-100'>";
                                    }else{
                                        echo "<div class='card text-white bg-danger o-hidden h-100'>";
                                    }
                                ?>
                                    <a class='card-header text-white clearfix'>
                                        <span class='float-middle'>
                                            <?php echo (string)$dish->dish_name." (".(string)$dish->dish_cat.")"; ?>
                                            <br>
                                            <?php echo (string)$restaurant->name." (".(string)$restaurant->rating.")"; ?>
                                        </span>
                                    </a>
                                    <div class='card-body'>
                                        <div class='card-body-icon'>
                                            <?php 
                                                #echo "<script>alert(".(string)$restaurant->dish_cat.");</script>";
                                                if((string)$dish->dish_cat=="Veg"){
                                                    echo "<i class='fas fa-seedling'></i>";
                                                }else{
                                                    echo "<i class='fas fa-bone'></i>";
                                                }
                                            ?>
                                        </div>
                                        <div class='mr-2 fill' align='center'>
                                            <?php echo "<img src='./dishes/".(string)$dish->dish_pic."'>";?>
                                        </div>
                                    </div>
                                    <a class='card-footer text-white clearfix small z-1' 
                                    href="javascript:setContent('/restaurant?id="+ <?php echo (string)$restaurant->id; ?> + 
                                                                "&dishid=" + <?php echo (string)$restaurant->id; ?> + "' );" >
                                        <span class='float-left'><?php echo (string)$restaurant->address; ?></span>
                                        <span class='float-right'>
                                            <?php echo "Rs.".(string)$dish->price; ?><i class='fas fa-angle-right'></i>
                                        </span>
                                    </a>
                                </div>
                            </div>
                            <?php
                             }
                            }
                        }
                        }
                    
                    