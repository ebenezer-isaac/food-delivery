<?php
$page = "Organizer Index";
#include "logger.php";
session_start();
if (isset($_SESSION["customer_id"])) {
    echo "<script>window.location.replace('main.php');</script>";
} else {
    ?><html lang="en" >
        <head>
            <style>.tooltipp .tooltiptext{visibility: hidden; background-color: #0d0d0d; font-size: 12px; color: #fff; text-align: center; border-radius: 6px; padding: 7px; /* Position the tooltip */ z-index: 1;}.tooltipp:hover .tooltiptext{visibility: visible;}body{height: 100%; overflow-y: scroll;}/* Hide scrollbar for Chrome, Safari and Opera */ ::-webkit-scrollbar{display: none;}/* Hide scrollbar for IE and Edge */ .abt:hover{text-decoration: none;}</style>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width,height=device-height, initial-scale=1">
            <script src="https://apis.google.com/js/platform.js"></script>
            <meta name="google-signin-client_id" content="741878761514-o7u4s9j21jjlq4opimncc64lpef966rc.apps.googleusercontent.com">
            <title>Login </title>
            <script src="https://kit.fontawesome.com/1ca2da442a.js" crossorigin="anonymous"></script>
            <link rel="stylesheet" href="css/shakeEffect.css">
            <link rel="stylesheet" href="css/bootstrap.css" type="text/css">
            <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
            <link rel="stylesheet" href="css/bootstrap-grid.css" type="text/css">
            <link rel="stylesheet" href="css/bootstrap-grid.min.css" type="text/css">
            <link rel="stylesheet" href="css/anim.css" type="text/css">
            <link rel="stylesheet" href="css/loader.css" type="text/css">
            <link rel="stylesheet" href="css/splash.css" type="text/css">
            <link rel="icon" href="images/logo.png" type="image/gif">
            <script src="vendor/jquery/jquery.min.js"></script>
            <script src='https://www.google.com/recaptcha/api.js?onload=recaptchaOnload&render=explicit' async defer></script> 
        </head>
        <body class='unselectable'>
            <div id="demo-content">
                <div id='splash-wrapper'>
                    <div id='splash'></div>
                    <div class='splash-section section-left'></div>
                    <div class='splash-section section-right'></div>
                </div>
                <div id="content">
                    <div class="wrapper">
                        <div class="main_body">
                            <div class="container custom_container">
                                
                                <div class="row custom_row">
                                    <div class="col-lg-6 my-auto">
                                        <div class="main_content mx-auto">
                                            <a href="about.html" target="_blank" class="text-white abt">
                                                <div data-tilt > <img src="images/logo.png" style="width: 101px; height: 101px; margin-bottom: 20px; pointer-events: none;"/></div>
                                                <h3 style="color:black"> Food Delivery </h3>
                                                <span style="color:white"> Click to know more </span> 
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 my-auto">
                                        <div class="form_container">
                                            <form style='text-align: center;'>
                                                <div class="form-group mail-tf">
                                                    <input type="email" id='email' class="form-control" name="email" placeholder="Email" title='Enter a valid e-mail address' required>
                                                    <i class="fa fa-user"></i> 
                                                </div>
                                                <div class="form-group pass-tf">
                                                    <input type="password" class="form-control active" id="pass" placeholder="Password" title='Enter the password associated with your e-mail address' required> 
                                                    <div id='eye' class='pass-tf' onclick="showPass()"><i class="fa fa-eye-slash" ></i></div>
                                                </div>
                                                <span id='mess' class="alert">Invalid Password</span><br>
                                                <div class="row">
                                                    <div class="col-3"></div>
                                                    <div class="col-7">
                                                        <div class="g-signin2" data-onsuccess="onSignIn"></div>
                                                    </div>
                                                    <div class="col-2"></div>
                                                </div>
                                                <button type="button" class="log-btn" id='loginbtn'>Login</button> 
                                                <p class="message"> 
                                                    Forgot your password? 
                                                    <a href="#" onclick="return transfer_data()"><b> Create a new password </b> </a> 
                                                </p>
                                            </form>
                                            <form method="post" class="recaptcha_form" style="display: none;">
                                                <div class="form-group"> <input type="email" placeholder="Email" class="form-control" name="emailid" id="emailid" required> <i class="fa fa-user"></i> </div>
                                                <div class="form-group custom_group">
                                                    <div id="recaptcha" class="g-recaptcha" data-sitekey="6LcmWcoUAAAAAI6AHCSSZCQFbovJ8opgL1AYPYG-"></div>
                                                </div>
                                                <p class="link"> <a href="resetpassword.html"> <b> I already have an OTP </b> </a> </p>
                                                <button type="submit"> Send OTP </button> 
                                                <p class="message"> Want to sign in? <a href="#"> <b> Sign in </b> </a> </p>
                                            </form> 

                                        </div>
                                    </div>
                                </div>
                               
                                <script src="js/tilt.jquery.js"></script>
                                <br><br><br>
                            </div><br><br><br><br>
                        </div>
                    </div>
                    <div id="particles-js"></div>
                    <div class="container">
                        <div class="modal custom_modal_recaptcha" id="modalrecaptcha">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <h4 style="font-size: 14px;"> We think you are a robot. Prove us wrong if you think if you are not.</h4>
                                    </div>
                                    <div class="modal-footer"> <button type="button" class="btn btn-success" onclick="closemodalrecaptcha()"> OK </button></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                function transfer_data(){
                    var x = document.getElementById("username").value;
                    document.getElementById("user").value = x;
                }
                function onSignIn(googleUser) {
                    var id_token = googleUser.getAuthResponse().id_token;
                    var profile = googleUser.getBasicProfile();
                    var name = profile.getName();
                    var image = profile.getImageUrl();
                    var email = profile.getEmail();
                    var xhr = new XMLHttpRequest();
                    xhr.open('POST', 'tokensignin.php');
                    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                    xhr.onload = function() {
                        alert(xhr.responseText);
                      if(xhr.responseText){
                        if (xhr.responseText == 1){
                            window.location.replace("main.php?url=home.php");
                        } else if(xhr.responseText == 2){
                            window.location.replace("main.php?url=profile.php");
                        }else{
                            $('.alert').fadeOut(500);
                            document.getElementById("mess").innerHTML = "Google Sigin Failed";
                            $('.pass-tf').addClass('wrong-entry');
                            $('.mail-tf').addClass('wrong-entry');
                            $('.alert').fadeIn(500);
                            setTimeout("$('.alert').fadeOut(1500);", 3000);
                            $('.pass-tf').keypress(function () {
                                $('.pass-tf').removeClass('wrong-entry');
                            });
                            $('.mail-tf').keypress(function () {
                                $('.mail-tf').removeClass('wrong-entry');
                            });
                        }
                      }
                    };
                    xhr.send('idtoken=' + id_token+"&name="+name+"&image="+image+"&email="+email);
                }
            </script> 
            <script src="vendor/jquery/jquery.min.js"></script>
            <script src="js/particles.js"></script> 
            <script src="js/index.js"></script> 
            <script src="js/scriptShake.js"></script>
            <script defer src="js/main.js"></script>
            <script src="js/app.js"></script>
            <script>
                var _captchaTries = 0;
                function recaptchaOnload() {
                _captchaTries++;
                        if (_captchaTries > 9)
                        return;
                        if ($('.g-recaptcha').length > 0) {
                            grecaptcha.render("recaptcha", {
                                sitekey: '6LcmWcoUAAAAAI6AHCSSZCQFbovJ8opgL1AYPYG-', 
                                callback: function () {
                                console.log('recaptcha callback');
                                }
                            });
                        return;
                        }
                window.setTimeout(recaptchaOnload, 1000);
                }
                $.ajax({url: "ajaxCheckSession.php", success: function(result){
                    if (result == 1){
                        window.location.replace('main.php'); 
                    }
                }});
            </script> 
        </body>
    </html>
    <?php
} 