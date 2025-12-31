<?php
require "../login-php/setting.php";
    $msql = new mysqli($users[0],$users[1],$users[2],$users[3]);
    $regem = filter_var(trim($_POST["regemail"]));
    $regname = filter_var(trim($_POST["regname"]));
    $regpass = filter_var(trim($_POST["regpass"]));
    $regpassrep = filter_var(trim($_POST["regrepass"]));
    $result1  = $msql->query("SELECT * FROM `auth` WHERE `email` = '$regem'");
    $user1 = $result1->fetch_assoc();
    if (mb_strlen($regem)<1 || mb_strlen($regem)>32){
        echo "Слишком короткий/длинная почта <a href="/">Назад.</a>";
        exit();
    }

    elseif (!empty($user1)){
        echo "Пользователь уже есть <a href='/'>Назад.</a>";
        exit();
    }
    
    elseif (mb_strlen($regpass)<1 || mb_strlen($regpass)>32){
        echo "Слишком короткий/длинный пароль <a href="/">Назад.</a>";
        exit();
    }

    
    elseif ($regpass != $regpassrep ){
        echo "Пароли не совпадают <a href="/">Назад.</a>";
        exit();
    }
    $uida = rand();
    $result  = $msql->query("SELECT * FROM `auth` WHERE `id` = '$uida'");
    $user = $result->fetch_assoc();
    while (!empty($user)){
        $uida = rand();
    }
    $regpass = md5($a1.$regpass.$a2);
    $regpassrep = md5($a1.$regpassrep.$a2);
    $msql = new mysqli($users[0],$users[1],$users[2],$users[3]);
    $msql->query("INSERT INTO `auth` (`id`,`email`,`pass`,`name`)
    VALUES('$uida','$regem','$regpass','$regname')");
    $msql->close();
    header("Location: /") ;
?>