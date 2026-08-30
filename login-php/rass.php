<?php
if(isset($_COOKIE['preference'])){
    require "setting.php";
    $emailrass = $_POST["emailsub"];
    $date =  date("Y-m-d");
    $dsn = "mysql:host=$users[0];dbname=$users[3];charset=utf8mb4";
      	
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // Включаем выброс исключений при ошибках
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       // Возвращаем ассоциативные массивы
        PDO::ATTR_EMULATE_PREPARES   => false,                  // Отключаем эмуляцию подготовленных запросов
    ];
    try {
      // 1. Подготавливаем запрос с безопасным маркером :email
      $pdo = new PDO($dsn,$users[1], $users[2], $options);
      $stmt = $pdo->prepare("SELECT * FROM `rass` WHERE `rass` = :email");

      // 2. Выполняем запрос, передавая переменную
      $stmt->execute([
          'email' => $emailrass
      ]);

      // 3. Получаем одну строку в виде ассоциативного массива
      $user_rass = $stmt->fetch(PDO::FETCH_ASSOC);

      if (!empty($user_rass)){
          echo "Почта уже в рассылке <a href='/'>Назад.</a>";
          exit();
      }elseif (!empty($emailrass)){

        // 1. Цикл генерации уникального UID
        $stmt = $pdo->prepare("SELECT 1 FROM `rass` WHERE `id` = :id LIMIT 1");
        do {
            $pass = md5($b1 . rand() . $b2);
            $stmt->execute(['id' => $pass]);
        } while ($stmt->fetch());

        // 2. Вставка записи в одну строку
        $stmt = $pdo->prepare("INSERT INTO `rass` (`date`, `rass`, `uid`) VALUES (:date, :rass, :uid)");
        $stmt->execute([
            'date' => $date,
            'rass' => $emailrass,
            'uid'  => $pass
        ]);
		echo "Почта теперь в рассылке <br>Мы рады что вы выбрали нас! <a href='/'>Назад.</a>";
      }else{
          echo "Не пустую почту! <a href='/'>Назад.</a>";
      }
      $stmt = null; // Сначала уничтожаем объект запроса
      $pdo = null;
  } catch (\PDOException $e) {
        // Обработка ошибки подключения или запроса
        throw new \PDOException($e->getMessage(), (int)$e->getCode());
  }
$stmt = null; // Сначала уничтожаем объект запроса
$pdo = null;
}
else{
    echo "Я запрещаю вам срать!";
};
    
   