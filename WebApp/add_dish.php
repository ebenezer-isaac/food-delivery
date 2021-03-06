<h4>Dish Details</h4>
<table style='overflow: auto;'>
    <tr>
        <td style='text-align:left;' width = '20%'>Name</td>
        <td width = '5%'> : </td>
        <td style='text-align:left;'><input id='dish_name' type="text" name= "name" size=30></td>
    </tr>
    <tr>
        <td style='text-align:left;' width = '20%'>Category</td>
        <td width = '5%'> : </td>
        <td style='text-align:left;'><select id="dish_category"><option value="Veg">Veg</option><option value="Non-Veg">Non-Veg</option></select></td>
    </tr>
     <tr>
        <td style='text-align:left;' width = '20%'>Cusine</td>
        <td width = '5%'> : </td>
        <td style='text-align:left;'><input id='dish_cuisine' type="text" name= "cusine" size=30></td>
    </tr>
    <tr>
        <td style='text-align:left;' width = '20%'>Taste</td>
        <td width = '5%'> : </td>
        <td style='text-align:left;'><input id='dish_taste' type="text" name= "taste" size=30></td>
    </tr>
    <tr>
        <td style='text-align:left;' width = '20%'>Price</td>
        <td width = '5%'> : </td>
        <td style='text-align:left;'><input id='dish_price' type="text" name= "price" size=30></td>
    </tr>
</table>
<input type="button" name= "save" value="Save" onclick="add_dish_details()"></p>
<script>
    function add_dish_details(){
        var name = document.getElementById('dish_name').value;
        var category = document.getElementById('dish_category').value;
        var cuisine = document.getElementById('dish_cuisine').value;
        var taste = document.getElementById('dish_taste').value;
        var price = document.getElementById('dish_price').value;
        $.ajax({
            url: "save_dish.php?type=new&name="+name+"&category="+category+"&cuisine="+cuisine+"&taste="+taste+"&price="+price, 
            success: function(result){
                alert(result);
                setContent('edit_dish.php');
        }});
    }
</script>