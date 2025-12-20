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

$user_ip = getClientIp();
    $date =  date("Y-m-d H:i:s");
    $msql = new mysqli("localhost","#","#","#");
    $result = $msql->query("SELECT COUNT(*) FROM `reacts` WHERE `ip` = '$user_ip'");
    $row = $result->fetch_assoc(); // Fetches one row as an associative array
    $ip = $row['COUNT(*)'];
    if ($ip>0){
        echo "Вы уже отправляли <a href="/">Назад.</a>";
        $msql->close();
        exit();
}
    else{
        $emo = $_POST["emote"];
        $msql->query("INSERT INTO `reacts` (`ip`,`Sadly`,`date_time`)
        VALUES('$user_ip','$emo','$date')");
        $msql->close();
        header("Location: /");
        exit();
    }
?>
