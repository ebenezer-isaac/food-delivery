Filter Restaurants by Name : <input type="text" onkeyup="javascript:getSearch()" id="search_text">
<br>
<br>
<div id='result'>
	<?php
	$servername = "sql290.main-hosting.eu";
	$username = "u117204720_food_club";
	$password = "5\$pANyPa^APH";
	$dbname = "u117204720_food_club";
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}

	$sql = "SELECT * FROM restaurants";
	$result = $conn->query($sql);
	if ($result) {
		echo "<div class='row'>";
		while($res = $result->fetch_assoc()) {?>
			<a class='col-xl-4 col-sm-4 mb-3' align='center' 
			href="javascript:setContent('restaurant.php?res_id=<?php echo $res["restaurant_id"]; ?>' );">
				<div class='card text-white bg-primary o-hidden h-100'>
					<div class='card-header text-white clearfix'>
						<span class='float-middle'>
							<?php echo $res["name"]; ?>
						</span>
					</div>
					<div class='card-body'>
						<div class='card-body-icon'>
			            	<i class="fas fa-utensils"></i>
						</div>
						<div class='mr-2 fill' align='center'>
							<?php echo "<img src='images/restaurants/res_".sprintf('%05d', $res["restaurant_id"]).".jpg'>";?>
						</div>
						<div class='mr-2' align='center'>
							<?php echo $res["address"];?>
						</div>
					</div>
					<div class='card-footer text-white clearfix small z-1'>
						<span class='float-left'>
							<?php echo "Rating : ".$res["rating"]; ?>
						<!-- 	<?php echo (string)$restaurant->address; ?> -->
						</span>
						<span class='float-right'>
							<i class='fas fa-angle-right'></i>
						</span>
					</div>
				</div>
			</a><?php
		}
	  echo "</div>";
	} else {
	  echo "0 results";
	}
	$conn->close()
 ?>
</div>	
<script>
	function getSearch(){
		var search = document.getElementById("search_text").value;
		$.get("res_search.php?search="+search, function(data, status){
    		document.getElementById("result").innerHTML = "<div class='res'>"+data+"</div>";
  		});
	}
</script>


