<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require '../phpmailer/Exception.php';
require '../phpmailer/PHPMailer.php';
require '../phpmailer/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

date_default_timezone_set('Europe/Moscow');

$date = date("H:i");
if($date==$date){
    require "setting.php";
    $msql = new mysqli( $users[0],$users[1],$users[2],$users[3]);
    $sql = "SELECT * FROM `rass`";
  
    $result = $msql->query($sql);
  	$row = $result->fetch_assoc();
  
    $mail = new PHPMailer(true);
    try {
        // Настройки сервера
        $mail->isSMTP();                                            
        $mail->Host       = '';                         
        $mail->SMTPAuth   = true;                                   
        $mail->Username   = '';                        
        $mail->Password   = $pass_email;                 
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;          
        $mail->Port       = 465;                                   
        $mail->CharSet    = 'UTF-8';                                
		
 
      
        // Отправитель и получатель
        $mail->setFrom('', 'Позитив'); 
        $mail->addReplyTo('', 'Админ');   
        $mail->addAddress(""); 
		
      	
        $uid =  $row["uid"]; 

        $tob = '/' . rawurlencode($uid);
      
      
        $b = mt_rand( 1, 200);
      
      	require("kiwi.php");
        $c = $quotes[$b];
      
        // Контент письма
        $mail->isHTML(true);                                     
        $mail->Subject = "=?utf-8?B?".base64_encode("Позитив 😀")."?="; 
        $mail->Body    = $c."<br> Если хочешь отписаться <a href='https://sorav.ru/login-php/del_email.php$tob'>Кликини сюда!</a>"; 
        $mail->AltBody = 'Письмо от sorav.ru';
          
        $mail->addCustomHeader('List-Unsubscribe', "<https://sorav.ru{$tob}>");
	 	$mail->addCustomHeader('List-Unsubscribe-Post', 'List-Unsubscribe=One-Click');
        $mail->send();
        echo 'Письмо успешно отправлено!';
    } catch (Exception $e) {
        echo "Ошибка отправки. Лог ошибки: {$mail->ErrorInfo}";
    }
    $msql->close();
}

else{
    echo $date ;
}
?>