<?php
$search_text = $_GET['search'];
if(strlen($search_text)>0){
	$xml = simplexml_load_file("./database/restaurants.xml");
	foreach ($xml->restaurant as $restaurant){
		if (strpos(trim(strtolower((string)$restaurant->name)), trim(strtolower($search_text))) !== false){?>
			<div class='col-xl-12 col-sm-12 mb-3' align='center'>
			<div class='card text-white bg-primary o-hidden h-100'>
				<a class='card-header text-white clearfix'>
					<span class='float-middle'>
						<?php echo (string)$restaurant->name; ?>
					</span>
				</a>
				<div class='card-body'>
					<div class='card-body-icon'>
		            	<i class="fas fa-utensils"></i>
					</div>
					<div class='mr-2' align='center'>
						<?php echo (string)$restaurant->address;?>
					</div>
				</div>
				<a class='card-footer text-white clearfix small z-1' 
				href="javascript:setContent('/restaurant?id="+ <?php echo (string)$restaurant->id; ?>+ "' );" >
					<span class='float-left'>
						<?php echo "Rating : ".(string)$restaurant->rating; ?>
					<!-- 	<?php echo (string)$restaurant->address; ?> -->
					</span>
					<span class='float-right'>
						<i class='fas fa-angle-right'></i>
					</span>
				</a>
			</div>
		</div><?php
		}
	}
}
?>

