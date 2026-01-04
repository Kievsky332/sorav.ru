<?php 

require  "/var/www/u3348639/data/vendor/autoload.php";

use Google\Client;
$client = new Client();
$client->setClientId("#");
$client->setClientSecret("#");
$client->setRedirectUri("https://sorav.ru/login-php/google.php");

$client->addScope("email");
$client->addScope("profile");
$client->addScope("openid");
?>