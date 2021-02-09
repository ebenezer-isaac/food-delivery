Enter the Dish Name that you want to search for : <input type="text" onkeyup="javascript:getSearch()" id="search_text">
<br><br>
Cuisine : <select id="cuisine" onchange="getSearch()" style="padding:3px 5px;">
  <option value="">Select</option>
  <option value="Italian">Italian</option>
  <option value="Indian">Indian</option>
  <option value="American">American</option>
  <option value="Chinese">Chinese</option>
  <option value="Chinese">Korean</option>
</select>

Type : <select id="cat"  onchange="getSearch()" style="padding:3px 5px;">
  <option value="">Select</option>
  <option value="V">Veg</option>
  <option value="N">Non-Veg</option>
</select>

Taste : <select id="taste" onchange="getSearch()" style="padding:3px 5px;">
  <option value="">Select</option>
  <option value="Sour">Sour</option>
  <option value="Salty">Salty</option>
  <option value="Spicy">Spicy</option>
  <option value="Sweet">Sweet</option>
</select>
<br>
<br>
<div id='result'></div>
<script>
function getSearch(){
	var cuisine = document.getElementById("cuisine").value;
  var cat = document.getElementById("cat").value;
  var taste = document.getElementById("taste").value;
  var search_text = document.getElementById("search_text").value;
  $.get("dish_search.php?cuisine="+cuisine+"&cat="+cat+"&taste="+taste+"&search_text="+search_text, function(data, status){
    		document.getElementById("result").innerHTML = "<div class='row'>"+data+"</div>";
		  });
}
</script>
<style type="text/css">
	.fill {
    	display: flex;
    	justify-content: center;
    	align-items: center;
    	overflow: hidden
	}
	.fill img {
    	flex-shrink: 0;
    	min-width: 100%;
    	min-height: 100%
	}
</style>
