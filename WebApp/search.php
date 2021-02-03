Enter the Dish Name that you want to search for : <input type="text" onkeyup="javascript:getSearch()" id="search_text">


Cuisine : <select id="mySelect1" onchange="myFunction1()" style="padding:3px 5px;">
  <option value="">select..
  <option value="Italian">Italian
  <option value="Indian">Indian
  <option value="American">American
  <option value="Chinese">Chinese
</select>

Type : <select id="mySelect2"  onchange="myFunction2()" style="padding:3px 5px;">
  <option value="">select..
  <option value="Veg">Veg
  <option value="Non-Veg">Non-Veg
</select>

Taste : <select id="mySelect3" onchange="myFunction3()" style="padding:3px 5px;">
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
function myFunction1()
{
	var x = document.getElementById("mySelect1").value;
  $.get("dis_cui_search.php?search1="+x, function(data, status){
    		document.getElementById("result").innerHTML = "<div class='row'>"+data+"</div>";
		  });
}
	function myFunction2() {
	
  var y = document.getElementById("mySelect2").value;
  $.get("dis_typ_search.php?search2="+y, function(data, status){
    		document.getElementById("result").innerHTML = "<div class='row'>"+data+"</div>";
		  });}

		  function myFunction3() {
		  var z = document.getElementById("mySelect3").value;
  $.get("dis_tas_search.php?search3="+z, function(data, status){
    		document.getElementById("result").innerHTML = "<div class='row'>"+data+"</div>";
		  });		  

}

	function getSearch(){
		var search = document.getElementById("search_text").value;
		$.get("dish_search.php?search="+search+"&cat=veg", function(data, status){
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
