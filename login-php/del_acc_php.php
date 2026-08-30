<?php
require __DIR__ . '/../phpmailer/Exception.php';
require __DIR__ . '/../phpmailer/PHPMailer.php';
require __DIR__ . '/../phpmailer/SMTP.php';
require "setting.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

    $email = $_COOKIE['mail']??'';
    
    $pass = $_POST["pass"];
    
    $pass = md5($a1.$pass.$a2);
    
    if (isset($email) || !empty($email)){
      $dsn = "mysql:host=$users[0];dbname=$users[3];charset=utf8mb4";

      $options = [
          PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // Включаем выброс исключений при ошибках
          PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       // Возвращаем ассоциативные массивы
          PDO::ATTR_EMULATE_PREPARES   => false,                  // Отключаем эмуляцию подготовленных запросов
      ];
      try {
        // 1. Подключение к базе данных
        $pdo = new PDO($dsn,$users[1], $users[2], $options);
        
        $stmt = $pdo->prepare('SELECT * FROM `auth` WHERE `email` = :login AND `pass`= :pass');
        $stmt->execute([
            'login' => $email,
            'pass'  => $pass
        ]);
        

        $user_rass = $stmt->fetch();
        if (!empty($user_rass)){
          
            $stmt = $pdo->prepare('DELETE FROM `auth` WHERE `email` = :login');
            $stmt->execute([
                'login' => $email
            ]);
          
            $stmt = null; // Сначала уничтожаем объект запроса
            $pdo = null;
          
            setcookie('user', '', time() - 3600, '/');
            setcookie('mail', '', time() - 3600, '/');
            echo "Аккаунт удалён <a href='/'>Назад.</a>";

          
          
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
   
                
            
                // Отправитель и получатель
                $mail->setFrom('', '); 
                $mail->addReplyTo('', '');   
                $mail->addAddress($email); 
    

                
                $to = $email; 

            
            

                // Контент письма
                $mail->isHTML(true);                                     
                $mail->Subject = "=?utf-8?B?".base64_encode("Удаление аккаунта ")."?="; 
                $mail->Body    = "<br> Привет мы получили от тебя запрос на удаление аккаунта! <br><br>Ваш аккаунт был удален с сайта sorav.ru"; // Основной контент
                $mail->AltBody = 'Письмо от sorav.ru';

                $mail->send();

            } catch (Exception $e) {
                    echo "Ошибка отправки. Лог ошибки: {$mail->ErrorInfo}";
            }            
            exit();
        }
        else if(empty($user_rass)){
            $stmt = null; // Сначала уничтожаем объект запроса
            $pdo = null;
            header("Location: /login-php/del_acc.php?lazy=1");
        }
        else{
            $stmt = null; // Сначала уничтожаем объект запроса
            $pdo = null;
            echo $email ." почта не может быть удалена ,ведь аккаунт уже удален!  <a href='/'>Назад.</a>";
        }
       
      } catch (\PDOException $e) {
            // Обработка ошибки подключения или запроса
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
      }
    }
    else{
        echo "У вас нету куки с почтой";
    }
?>