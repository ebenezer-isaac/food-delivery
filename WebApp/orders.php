<?php
$xml=simplexml_load_file("./database/history.xml") or die("Error: Cannot create object");
foreach($xml->orders as $order) {
  echo $order->order_id . ", ";
  echo $order->restaurant_id . ", ";
  echo $order->date("Y/m/d"). ", "; 
  echo $order->time("h:i:sa"). ", ";
  echo $order->agent_id . ",";
  echo $order->delivery_address . ",";
  $counter = 0;
  foreach($Contents as $dishes){
       $counter++;
#       $dishes[number] ;
  }     
  echo $order->dish_id1 . ",";
  echo $order->dishprice . ",";
  echo $order->quantity . ",";
  echo $order->dish_id2 . ",";
  echo $order->dishprice . ",";
  echo $order->quantity . ",";
  echo $order->delivery_status ."</br>";
}