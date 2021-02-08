<?php
require_once 'googlesignin/vendor/autoload.php';
$id_token = $_POST["idtoken"];
$name = $_POST["name"];
$image = $_POST["image"];
$email = $_POST["email"];
$CLIENT_ID = "741878761514-o7u4s9j21jjlq4opimncc64lpef966rc.apps.googleusercontent.com";
$client = new Google_Client(['client_id' => $CLIENT_ID]);
$payload = $client->verifyIdToken($id_token);
if ($payload) {
  $userid = $payload['sub'];
  echo $name;
  echo $image;
  echo $email;
} else {
  echo "Invalid Signin";
}



