Enter the Dish Name that you want to search for : <input type="text" onkeyup="javascript:getSearch()" id="search_text">


Cuisine : <select id="mySelect1" onchange="getSearch()" style="padding:3px 5px;">
  <option value="">select..
  <option value="Italian">Italian
  <option value="Indian">Indian
  <option value="American">American
  <option value="Chinese">Chinese
</select>

Type : <select id="mySelect2"  onchange="getSearch()" style="padding:3px 5px;">
  <option value="">select..
  <option value="Veg">Veg
  <option value="Non-Veg">Non-Veg
</select>

Taste : <select id="mySelect3" onchange="getSearch()" style="padding:3px 5px;">
  <option value="">select..
  <option value="Sour">Sour
  <option value="Salty">Salty
  <option value="Spicy">Spicy
  <option value="Sweet">Sweet
</select>



<br>
<br>
<div id='result'></div>
<script>
function getSearch()
{
  var search_text = document.getElementById("search_text").value;
	var x = document.getElementById("mySelect1").value;
  var y = document.getElementById("mySelect2").value;
  var z = document.getElementById("mySelect3").value;

  $.get("com_search.php?search1="+x+"&search2="+y+"&search3="+z+"&search_text="+search_text, function(data, status){
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
