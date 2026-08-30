<?php
function getClientIp() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP']; // IP от клиента (редко)
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR']; // IP через прокси/балансировщик
    } else {
        $ip = $_SERVER['REMOTE_ADDR']; // IP самого сервера (если нет прокси)
    }
    return $ip;
}

if(isset($_COOKIE['preference'])){
	$user_ip = getClientIp();
    $date =  date("Y-m-d H:i:s");
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
      
      $stmt = $pdo->prepare("SELECT COUNT(*) FROM `reacts` WHERE `ip` = :ip");

      // 2. Выполняем запрос, передавая очищенный IP-адрес
      $stmt->execute([
          'ip' => trim($user_ip) // trim убирает случайные пробелы, которые были в вашем исходном коде '$user_ip '
      ]);

      // 3. Получаем сразу число из первой колонки
      $ip = $stmt->fetchColumn();

      if ($ip>0){
      	  $stmt = null; // Сначала уничтожаем объект запроса
          $pdo = null;
          header("Location: /?lazy=3");
      }else{

          $emo = $_POST["emote"];
          if ($emo==1 or $emo==0){
              // 1. Подготавливаем запрос с безопасными маркерами (плейсхолдерами)
              $stmt = $pdo->prepare("INSERT INTO `reacts` (`ip`, `Sadly`, `date_time`) VALUES (:ip, :emo, :date_time)");

              // 2. Выполняем запрос, передавая массив со значениями
              $stmt->execute([
                  'ip'        => $user_ip,
                  'emo'       => $emo,
                  'date_time' => $date
              ]);

              $stmt = null; // Сначала уничтожаем объект запроса
              $pdo = null;
              header("Location: /?lazy=4");

          }else{
              header("Location: /?lazy=1");
          }
          $stmt = null; // Сначала уничтожаем объект запроса
          $pdo = null;

      }
  } catch (\PDOException $e) {
        // Обработка ошибки подключения или запроса
        throw new \PDOException($e->getMessage(), (int)$e->getCode());
  }
}else{
    header("Location: /?lazy=2");
}
?>
