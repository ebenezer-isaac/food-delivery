<?php
$page = "Organizer Home";
#include "logger.php";
date_default_timezone_set("Asia/Calcutta");
session_start();
if (isset($_SESSION["customer_id"])) {
    echo "Home Page";
    ?>

<div class='col-xl-4 col-sm-6 mb-3' align='center'>
 <div class='card text-white bg-warning o-hidden h-100'>
 <a class='card-header text-white clearfix'>
 <span class='float-middle'>Fried Rice</span>
 </a>
 <div class='card-body'>
 <div class='card-body-icon'>
 <i class=\"fas fa-times\"></i>
 </div>
 <div class='mr-2' align='center'><br>Photo<br><br></div>
 </div>
 <br><br>
 <a class='card-footer text-white clearfix small z-1' 
 href=\"javascript:setContent('/Cerberus/editTimetable?lab=" + i + "');\">
 <span class='float-left'>Arya Bhavan</span>
 <span class='float-right'>
    Rs. 200
 <i class='fas fa-angle-right'></i>
 </span>
 </a>
 </div>
 </div>


    <?php
} else {
    echo "<script>window.location.replace('index.php');</script>";
}
