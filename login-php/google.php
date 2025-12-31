<?php

require "../login-php/setup.php";

$a = $_GET["code"];

if(empty($a)){
    exit("Ошибка!");
}

$token = $client->fetchAccessTokenWithAuthCode($a);
$client->setAccessToken($token);

$oauth = new Google\Service\Oauth2($client);

$userInfo = $oauth->userinfo->get();

$name = $userInfo->name;
$email = $userInfo->email;
setcookie('user',$name,time() +60*60*24*31 , "/"); 
setcookie('mail',$email,time() +60*60*24*31 , "/"); 
header("Location: /");
?>