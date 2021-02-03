Enter the Dish Name that you want to search for : <input type="text" onkeyup="javascript:getSearch()" id="search_text">
<br>
<br>
<div id='result'></div>
<script>
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
