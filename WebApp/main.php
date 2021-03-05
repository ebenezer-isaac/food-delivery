<?php
date_default_timezone_set("Asia/Calcutta");
session_start();
if (isset($_SESSION["customer_id"])) {
    if(isset($_SESSION["customer_typ"])){
        if($_SESSION["customer_typ"]==1){
            include "side_cust.php";
        }else{
            include "side_rest.php";        
        }
    }
    echo"<script src='js/jquery.min.js'></script>
        <script src='js/bootstrap.bundle.min.js'></script>
        <script src='js/jquery.easing.min.js'></script>
        <script src='js/Chart.min.js'></script>
        <script src='js/jquery.dataTables.js'></script>
        <script src='js/dataTables.bootstrap4.js'></script>
        <script src='js/sb-admin.min.js'></script>
        <script src='js/ajax.js'></script>";
    if (isset($_REQUEST["url"])) {
        echo "<script>setContent('" . $_REQUEST["url"] . "')</script>";
    } else {
        echo "<script>setContent('home.php')</script>";
    }
    include "end.php";
} else {
    echo "<script>window.location.replace('index.php');</script>";
}