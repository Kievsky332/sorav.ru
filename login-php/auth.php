<?php
    $login = filter_var(trim($_POST["login"]));
    $pass = filter_var(trim($_POST["pass"]));
    $pass = md5("#".$pass."#");
    $msql = new mysqli("#","#","#","#");
    $result  = $msql->query("SELECT * FROM `auth` WHERE `email` = '$login'  AND `pass` = '$pass'");
    $user = $result->fetch_assoc();
    if (empty($user)){
        echo "Проверьте пароль/логин <a href='/'>Назад.</a>";
        exit();
    }
    else{
        setcookie('user',$user['name'],time() +60*60*24*31 , "/"); 
        header("Location: /");
    }
    $msql->close();
    
?>