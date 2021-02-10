<?php
if(!isset($_COOKIE["cart_obj"])) {
  header("Set-Cookie: cart_obj={};");
}?>
<html>
<body>
    <div id="cart_main"></div>
    <style>
        input[type=number]::-webkit-inner-spin-button, 
        input[type=number]::-webkit-outer-spin-button { 
            opacity: 1;
        }
    </style>
    <script type="text/javascript">
        var cart_obj={};
        var res_id=0;
        if (this.document.cookie.length != 0) {
            var cart_array = document.cookie.split(";");
            for(var i = 0; i <cart_array.length; i++) {
                if(cart_array[i].trim().startsWith("cart_obj",0)){
                    cart_array[i] = cart_array[i].replace("cart_obj=","");
                    cart_array[i] = cart_array[i].replaceAll("'","\"");
                    cart_obj = JSON.parse(cart_array[i]);
                    //document.getElementById("cart_main").innerHTML = JSON.stringify(cart_obj);
                }else if(cart_array[i].trim().startsWith("res_id",0)){
                    cart_array[i] = cart_array[i].replace("res_id=","");
                    res_id = parseInt(cart_array[i]);
                }
            }
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("cart_main").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "cart_display.php?res_id="+res_id+"&cart="+JSON.stringify(cart_obj), true);
            xhttp.send();
        } 
        function add_to_cart(quantity, dish_id){
            cart_obj[""+String(dish_id)]=quantity;
            var jsonString = JSON.stringify(cart_obj);
            document.cookie = "cart_obj=" + jsonString + ";expires=Wed, 12 May 2021 01:00:00 UTC;";
        }  
        function change_price(price, quantity, dish_id){
            document.getElementById("amount_"+dish_id).innerHTML=parseInt(price)*parseInt(quantity);
            var total =0;
            for(dish in cart_obj){
                var amount = parseInt(document.getElementById("amount_"+dish).textContent);
                total = total + amount;
            }
            document.getElementById("grand").innerHTML=total;
        }
    </script>
</body>
</html>
