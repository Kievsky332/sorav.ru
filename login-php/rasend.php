<?php
require __DIR__ . '/../phpmailer/Exception.php';
require __DIR__ . '/../phpmailer/PHPMailer.php';
require __DIR__ . '/../phpmailer/SMTP.php';
require __DIR__ . '/kiwi.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

date_default_timezone_set('Europe/Moscow');

$date = date("H:i");
if($date=="08:00"){
    require __DIR__ . '/setting.php';
    $msql = new mysqli( $users[0],$users[1],$users[2],$users[3]);
    $sql = "SELECT * FROM `rass`";
    $result = $msql->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $mail = new PHPMailer(true);
            try {
                // Настройки сервера
                $mail->isSMTP();                                            
                $mail->Host       = '';                         
                $mail->SMTPAuth   = true;                                   
                $mail->Username   = '';                          // Логин
                $mail->Password   = $pass_email;                 // Пароль для приложения
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;          
                $mail->Port       = 465;                                   
                $mail->CharSet    = 'UTF-8';                                
   
                $email =  $row["rass"]; 
            
                // Отправитель и получатель
                $mail->setFrom(', 'Позитив'); 
                $mail->addReplyTo('', 'Админ');   
                $mail->addAddress($email); 
    
                $uid =  $row["uid"]; 
                
                $to = $email; 
                $tob = '/' . rawurlencode($uid);
            
            
                $b = mt_rand( 1, 200);
                $c = $quotes[$b];
                // Контент письма
                $mail->isHTML(true);                                     
                $mail->Subject = "=?utf-8?B?".base64_encode("Позитив 😀")."?="; 
                $mail->Body    = $c."<br> Если хочешь отписаться <a href='https://sorav.ru/login-php/del_email.php$tob'>Кликини сюда!</a>"; // Основной контент
                $mail->AltBody = 'Письмо от sorav.ru';
                $mail->addCustomHeader('List-Unsubscribe', "<https://sorav.ru{$tob}>");
                $mail->addCustomHeader('List-Unsubscribe-Post', 'List-Unsubscribe=One-Click');  
                $mail->send();
                echo 'Письмо успешно отправлено!';
                sleep(2);
            } catch (Exception $e) {
                    echo "Ошибка отправки. Лог ошибки: {$mail->ErrorInfo}";
            }
        }           
    }
   
    else {
        $msql->close();
        echo "0 results";
    }
    $msql->close();
}

else{
    echo $date;

}
?>