<?php
    require "../login-php/setting.php";
    $email = explode('/', $_SERVER['REQUEST_URI'])[3];

  	$dsn = "mysql:host=$users[0];dbname=$users[3];charset=utf8mb4";
      	
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // Включаем выброс исключений при ошибках
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       // Возвращаем ассоциативные массивы
        PDO::ATTR_EMULATE_PREPARES   => false,                  // Отключаем эмуляцию подготовленных запросов
    ];
    try {
      // 1. Подключение к базе данных
      $pdo = new PDO($dsn,$users[1], $users[2], $options);
      
      $login = $_POST["login"];
      $pass = $_POST["pass"];
      $pass = md5($a1.$pass.$a2);
      
      $stmt = $pdo->prepare('SELECT * FROM `rass` WHERE `uid` = :uid');
      $stmt->execute([
          'uid' => $email
      ]);


      $user_rass =  $stmt->fetch();
      if (!empty($user_rass)){
      $stmt = $pdo->prepare('DELETE FROM `rass` WHERE `uid` = :uid');
      $stmt->execute([
          'uid' => $email
      ]);
      	  $stmt = null; // Сначала уничтожаем объект запроса
          $pdo = null; 
          echo "Почта удалена из рассылки <a href='/'>Назад.</a>";
          exit();
      }
      else{
      	  $stmt = null; // Сначала уничтожаем объект запроса
          $pdo = null;
          echo " Почты уже нет в рассылке <a href='/'>Назад.</a>";
      }
    } catch (\PDOException $e) {
        // Обработка ошибки подключения или запроса
        throw new \PDOException($e->getMessage(), (int)$e->getCode());
  }
?>