<?php
$xml = simplexml_load_file("./database/res.xml");
foreach ($xml->res as $res)
{
echo $res->res_id. "<br> " ;
echo $res->name . "<br> ";
echo $res->address ."<br>";
echo $res->dishes ."<br> ";
echo $res->rating . "<br> ";
} 
?>
