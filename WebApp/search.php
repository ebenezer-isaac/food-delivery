<input type="text" onkeyup="javascript:getSearch()" id="search_text">
<script>
	function getSearch(){
		var search = document.getElementById("search_text").value;
		$.get("result.php?search="+search, function(data, status){
    		alert("Data: " + data + "\nStatus: " + status);
  		});
	}
</script>