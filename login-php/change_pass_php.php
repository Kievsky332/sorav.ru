<?php
    require "setting.php";
    $email = $_COOKIE['mail'];
    
    
    if (isset($email) || !empty($email)){
        $dsn = "mysql:host=$users[0];dbname=$users[3];charset=utf8mb4";
      	
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // Включаем выброс исключений при ошибках
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       // Возвращаем ассоциативные массивы
            PDO::ATTR_EMULATE_PREPARES   => false,                  // Отключаем эмуляцию подготовленных запросов
        ];
        try {
          $pass = $_POST["pass"];
          $newpass = $_POST["newpass"];
          $renewpass = $_POST["newpass1"];

          $pass = md5($a1.$pass.$a2);
          $newpass = md5($a1.$newpass.$a2);
          $renewpass = md5($a1.$renewpass.$a2);
          
          // 1. Подключение к базе данных
          $pdo = new PDO($dsn,$users[1], $users[2], $options);
          
          $stmt = $pdo->prepare('SELECT * FROM `auth` WHERE `email` = :login  AND `pass` = :pass');
          $stmt->execute([
              'login' => $email,
              'pass'  => $pass
          ]);
                   
          $user = $stmt->fetch();
                   
          if ( !empty($user) and $newpass==$renewpass){
              $stmt = $pdo->prepare('UPDATE auth SET `pass`= :newpass WHERE email = :login');
              $stmt->execute([
                  'login' => $email,
                  'newpass'  => $newpass
              ]);

              $stmt = null; // Сначала уничтожаем объект запроса
         	  $pdo = null;
              header("Location: /login-php/change_pass.php/lazy=1");
          }
          else if(empty($user)){
              header("Location: /login-php/change_pass.php?lazy=2");
              $stmt = null; // Сначала уничтожаем объект запроса
         	  $pdo = null;
              exit();
          }
          else if($newpass!=$renewpass){
              $stmt = null; // Сначала уничтожаем объект запроса
         	  $pdo = null;
              header("Location: /login-php/change_pass.php?lazy=3");
          }
          else{
              header("Location: /login-php/change_pass.php?lazy=4");
          }
        } catch (\PDOException $e) {
              // Обработка ошибки подключения или запроса
              throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }             
    }
    else{
        header("Location: /login-php/change_pass.php?lazy=5");
    }
?>