<?php
if(!isset($_COOKIE["cart_obj"])) {
  header("Set-Cookie: cart_obj={'c_quantity':'def1','c_dishid':'def2'};");
}
?>
<html>
<body>
    <input id="Text1" type="text" />
    <input id="Text2" type="text" />
    <input id="Button1" type="button" value="button" onclick="store_in_cart(document.getElementById('Text1').value, document.getElementById('Text2').value)" />
    <br />

    <script type="text/javascript">
        window.onload = function () {
            if (document.cookie.length != 0) {
                this.retrive_cookies();
            }
        }
        var res_id;
        var c_array_object = {};
        function store_in_cart(quantity, dishid) {
            c_array_object.c_quantity = quantity;
            c_array_object.c_dishid = dishid;
            var jsonString = JSON.stringify(c_array_object);
            document.cookie = "cart_obj=" + jsonString + ";expires=Wed, 12 May 2021 01:00:00 UTC;";
            alert("The cookie has been set");
        }
       function retrive_cookies() {
            alert("Refreshed!!!");
            if (this.document.cookie.length != 0) {
                var cart_array = document.cookie.split(";");
                for(var i = 0; i <cart_array.length; i++) {
                    if(cart_array[i].startsWith("cart_obj",0)){
                        cart_array[i] = cart_array[i].replace("cart_obj=","");
                        cart_array[i] = cart_array[i].replaceAll("'","\"");
                        c_array_object = JSON.parse(cart_array[i]);
                    }
                }
                this.document.getElementById("Text1").value = c_array_object.c_quantity;
                this.document.getElementById("Text2").value = c_array_object.c_dishid;
            }
        }
    </script>
</body>
</html>"
