<?php
$search_text = $_GET['search'];
$result="";
$xml = simplexml_load_file("./database/restaurant.xml");
	foreach ($xml->res as $res) {
		// echo $res->name."<br>";
		foreach ($res->dishes->dish as $dish) {
			// echo $dish."<br>";
			// echo "xml : ".trim(strtolower((string)$dish->dish_name));
			// echo "<br>text : ".trim(strtolower($search_text));
			if (strpos(trim(strtolower((string)$dish->dish_name)), trim(strtolower($search_text))) !== false){
				$dish["res_name"]=(string)$res->name;
				$dish["res_id"]=(string)$res->id;
				$dish["res_rating"]=(string)$res->rating;
				$dish["res_address"]=(string)$res->address;
				$dish["dish_id"]=(string)$dish->diet_id;
				$dish["dish_name"]=(string)$dish->dish_name;
				$dish["diet_type"]=(string)$res->diet_type;
				$dish["category"]=(string)$res->category;
				$dish["price"]=(string)$res->price;
				foreach ($dish as $key => $value) {
    				echo "Key: $key; Value: $value<br>\n";
				}
			}
			echo "<br>\n";    
		}
	}
echo $result;
	// if($email == (string)$customer->email_id && $hashed == (string)$customer->password ){
	// 		session_start();
 //        	$_SESSION["customer_id"]=(string)$customer->customer_id;
 //        	exit("1");	
 //            echo (string)$customer->customer_id;
	// 	}	


	// 	    <res> 
 //        <id>12345</id>
 //    	<name>Copeer kitchen</name> 
 //        <rating>4.2/5</rating> 
 //        <address>No.5, Arunachalam Road,Opp Prasad Studio, Saligramam,Vadapalani, Chennai - 600093</address> 
 //        <dishes>
 //            <dish>
 //                <diet_type>nv</diet_type> 
 //                <category>Indian</category>
 //                <dish_id>dish_21342</dish_id> 
 //                <dish_name>Chicken Briyani</dish_name>
 //                <price> 240 </price>
 //            <dish>
 //           