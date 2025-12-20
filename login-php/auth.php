<?php
    $login = filter_var(trim($_POST["login"]),
    FILTER_SANITIZE_STRING);
    $pass = filter_var(trim($_POST["pass"]),
    FILTER_SANITIZE_STRING);
    $pass = md5("#".$pass."#");
    $msql = new mysqli("#","#","#","#");
    $result  = $msql->query("SELECT * FROM `auth` WHERE `email` = '$login'  AND `pass` = '$pass'");
    $user = $result->fetch_assoc();
    if (empty($user)){
        echo "Проверьте пароль/логин <a href="/">Назад.</a>";
        exit();
    }
    setcookie('user',$user['email'],time() +60*60*24*31 , "/");
    $msql->close();
    header("Location: /");
?>