<?php
$xml = simplexml_load_file("./database/res.xml");
foreach ($xml->res as $res)
{
echo $res->res_id. "<br> " ;
echo $res->name . "<br> ";
echo $res->address ."<br>";
echo $res->rating . "<br> ";
foreach ($res->dishes as $dishes)
{
foreach ($dishes->dish as $dish)
{
echo $dish->dish_name ."<br> ";
echo $dish->dish_id ."<br> ";
echo $dish->dish_cat ."<br> ";
echo $dish->price ."<br> ";

}
}
} 
?>
