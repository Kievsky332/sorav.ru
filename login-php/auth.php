<?php
if(isset($_COOKIE['preference'])){
    require "setting.php";
  
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
      
      $stmt = $pdo->prepare('SELECT * FROM `auth` WHERE `email` = :login  AND `pass` = :pass');
      $stmt->execute([
          'login' => $login,
          'pass'  => $pass
      ]);
      $user = $stmt->fetch();

      if (empty($user)){
          $stmt = null; // Сначала уничтожаем объект запроса
          $pdo = null;
          header("Location: /login/?log=1");
      }
      else{
          $stmt = null; // Сначала уничтожаем объект запроса
          $pdo = null;
          setcookie('user',$user['name'],time() +60*60*24*31 , "/"); 
          setcookie('mail',$user['email'],time() +60*60*24*31 , "/"); 
          header("Location: /");
      }
      	  $stmt = null; // Сначала уничтожаем объект запроса
          $pdo = null;


  } catch (\PDOException $e) {
        // Обработка ошибки подключения или запроса
        throw new \PDOException($e->getMessage(), (int)$e->getCode());
  }


}else{
    header("Location: /login/?log=0");
};
?>