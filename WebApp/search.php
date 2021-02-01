Enter the Dish Name that you want to search for : <input type="text" onkeyup="javascript:getSearch()" id="search_text">
<br>
<br>
<div id='result'></div>
<script>
	function getSearch(){
		var search = document.getElementById("search_text").value;
		$.get("result.php?search="+search, function(data, status){
    		document.getElementById("result").innerHTML = "<div class='row'>"+data+"</div>";
  		});
	}
</script>