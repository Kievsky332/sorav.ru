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
       
      $regem = $_POST["regemail"];
      $regname = $_POST["regname"];
      $regpass = $_POST["regpass"];
      $regpassrep = $_POST["regrepass"];
       
      $stmt = $pdo->prepare('SELECT * FROM `auth` WHERE `email` = :regem');
      $stmt->execute([
          'regem' => $regem
      ]);
      $user1 = $stmt->fetch();

       
      if (mb_strlen($regem)<1 || mb_strlen($regem)>32){
          header("Location: /login/?log=3");
          exit();
      }

      elseif (!empty($user1)){
          header("Location: /login/?log=4");
          exit();
      }

      elseif (mb_strlen($regpass)<1 || mb_strlen($regpass)>32){
          header("Location: /login/?log=5");
          exit();
      }


      elseif ($regpass != $regpassrep ){
          header("Location: /login/?log=6");
          exit();
      }
    // Заменяем ваш блок генерации ID и цикл while на этот:
    do {
        $uida = rand(); // Генерируем новый случайный ID

        $stmt = $pdo->prepare('SELECT id FROM `auth` WHERE `id` = :uida');
        $stmt->execute([
            'uida' => $uida
        ]);
        $user = $stmt->fetch(); // Обновляем переменную $user на каждом шаге цикла

    } while (!empty($user)); // Цикл повторится, если такой ID уже найден в базе данных


       
      $regpass = md5($a1.$regpass.$a2);
      $regpassrep = md5($a1.$regpassrep.$a2);
      

      $stmt = $pdo->prepare('INSERT INTO `auth` (`id`,`email`,`pass`,`name`)
      VALUES(:uida,:regem,:regpass,:regname)');
      $stmt->execute([
          'regem' => $regem,
          'uida' => $uida,
          'regpass' => $regpass,
          'regname'=> $regname
      ]);
       
      $stmt = null; // Сначала уничтожаем объект запроса
      $pdo = null;
      
      header("Location: /") ;
      } catch (\PDOException $e) {
            // Обработка ошибки подключения или запроса
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
      }

}
else{
    header("Location: /login/?log=0");
};
?>