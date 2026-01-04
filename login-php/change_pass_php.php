<?php
    require "setting.php";
    $email = $_COOKIE['mail'];
    
    $pass = strip_tags($_POST["pass"]);
    $newpass = strip_tags($_POST["newpass"]);
    $renewpass = strip_tags($_POST["newpass1"]);
    
    $pass = md5($a1.$pass.$a2);
    $newpass = md5($a1.$newpass.$a2);
    $renewpass = md5($a1.$renewpass.$a2);
    
    if (isset($email) || !empty($email)){
        $msql = new mysqli($users[0],$users[1],$users[2],$users[3]);
        $result  = $msql->query("SELECT * FROM `auth` WHERE `email` = '$email' AND `pass`='$pass'");
        $user= $result->fetch_assoc();
        if ( !empty($user) and $newpass==$renewpass){
            $msql->query("UPDATE auth SET `pass`= '$newpass' WHERE email = '$email';");
            $msql->close();
            echo "Пароль изменен <a href='/'>Назад.</a> ";
        }
        else if(empty($user)){
            echo "Старый пароль не сходится! <a href='/'>Назад.</a>";
            $msql->close();
            exit();
        }
        else if($newpass!=$renewpass){
            $msql->close();
            echo " Новые пароли не сходятся!  <a href='/'>Назад.</a>";
        }
        else{
            echo "Ошибка!";
        }
    }
    else{
        echo "У вас нету куки с почтой";
    }
?>