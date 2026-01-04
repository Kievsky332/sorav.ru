<?php
require "setting.php";
    $login = strip_tags($_POST["login"]);
    $pass = strip_tags($_POST["pass"]);
    $pass = md5($a1.$pass.$a2);
    $msql = new  mysqli($users[0],$users[1],$users[2],$users[3]);
    $result  = $msql->query("SELECT * FROM `auth` WHERE `email` = '$login'  AND `pass` = '$pass'");
    $user = $result->fetch_assoc();
    if (empty($user)){
        echo "Проверьте пароль/логин <a href='/'>Назад.</a>";
        exit();
    }
    else{
        setcookie('user',$user['name'],time() +60*60*24*31 , "/"); 
        setcookie('mail',$user['email'],time() +60*60*24*31 , "/"); 
        header("Location: /");
    }
    $msql->close();
    
?>