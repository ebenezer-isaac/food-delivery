<?php
date_default_timezone_set("Asia/Calcutta");
if (isset($_SESSION["customer_id"])) {
    ?><!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <meta name="description" content="">
            <meta name="author" content="">
            <link rel="icon" href="images/logo.png" type="image/gif">
            <title>Food Delivery</title>
            <script src="https://kit.fontawesome.com/1ca2da442a.js" crossorigin="anonymous"></script>
            <link href="css/dataTables.bootstrap4.css" rel="stylesheet">
            <link href="css/sb-admin.css" rel="stylesheet">
            <link href="css/dropdowns.css" rel="stylesheet">
            <link rel="stylesheet" href="css/loader.css" type="text/css">
            <link rel="stylesheet" href="css/anim.css" type="text/css">
            <link rel="stylesheet" href="css/side.css" type="text/css">
            <style>#wrapper{}#main{} </style>
        </head>
        <body id="page-top">
            <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
                <img src="images/logo.png" height="40" align='center' width="50"> 
                <a class="navbar-brand mr-1" href="about.html" style='color:black;'>Food Club</a>
                <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#"> 
                    <i style='color:black;' class="fas fa-bars"></i> </button> 
                <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0"> </form>
                <ul class="navbar-nav ml-auto ml-md-0">
                    <li >
                        <a id='profile-menu' href="cart.php" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <a href="cart.php">
                                <i style='margin:5px; color:black' class="fas fa-shopping-cart"></i>
                            </a>
                        </a>
                    </li>                    
                </ul>
            </nav>
            <div id="wrapper">
                <ul class="sidebar navbar-nav">
                    <li class="nav-item"> 
                        <a class="nav-link" href="javascript:setContent('home.php');" style="color:black">
                            <i style='margin:5px' class="fas fa-home"></i><span>Home</span></a> 
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:setContent('restaurants.php');" style="color:black">
                            <i style='margin:5px' class="fas fa-utensils"></i><span>Restuarant</span></a> 
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:setContent('search.php');" style="color:black">
                            <i style='margin:5px' class="fas fa-search"></i><span>Search</span></a> 
                    </li>
                    <li class="nav-item"> 
                        <a class="nav-link" href="javascript:setContent('history.php');" style="color:black">
                            <i style='margin:5px' class="fas fa-shipping-fast"></i><span>History</span></a> 
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:setContent('profile.php');" style="color:black">
                            <i style='margin:5px' class="fas fa-user"></i><span>Profile</span></a> 
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:setContent('signout.php');" style="color:black">
                            <i style='margin:5px' class="fa fa-sign-out-alt"></i><span>Logout</span></a>
                    </li>
                    <div style="height:100%" onclick="javascript:document.getElementById('sidebarToggle').click();"></div>
                </ul>
                <div id="content-wrapper">
                    <div class="container-fluid">
                        <ol class="breadcrumb" id='navigator'>
                            <li class="breadcrumb-item"> <a href="javascript:setContent('home.php');">Homepage</a> </li>
                            <li class="breadcrumb-item active">Overview</li>
                        </ol>
                        <div id='main' style='display: none;color:black;' align='center'>     
                            <?php
                        } else {
                            echo "<script>window.location.replace('index.php');</script>";
                        }
