<?php
    require("../../login-php/setting.php");
	header('Content-Type: application/json; charset=utf-8');
	$user = 'None';
	$mail = 'None';
	$preference ='None';
	if(isset($_COOKIE['user']) && isset($_COOKIE['mail'])){
    	$mail = strip_tags($_COOKIE['mail']);
        $user = strip_tags($_COOKIE['user']);
    }
	if(isset($_COOKIE['preference'])){
      if  ($_COOKIE['preference'] == 'yes'){
      	$preference = strip_tags($_COOKIE['preference']); 
      }	   
    }
	$ui = [
    	"name" => $user,
        "mail"=> $mail,
        "preference" => $preference
    ];

      echo json_encode($ui);

?>