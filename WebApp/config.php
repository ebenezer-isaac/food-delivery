<?php

$servername="sql290.main-hosting.eu";
$dbname="u117204720_food_club";
$username="u117204720_food_club";
$password="5\$pANyPa^APH";
$conn=mysqli_connect($servername,$username,$password,$dbname) or die($conn);


if(!$conn)
{
    die('connection failed'.mysqlerror());

}else{
    
    mysqli_close($conn);
}


?>