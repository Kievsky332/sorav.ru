<?php
    require "../login-php/setting.php";
    $email = $_COOKIE['mail'];
    
    $pass = filter_var(trim($_POST["pass"]));
    
    $pass = md5($a1.$pass.$a2);
    
    if (isset($email) || !empty($email)){
        $msql = new mysqli($users[0],$users[1],$users[2],$users[3]);
        $result  = $msql->query("SELECT * FROM `auth` WHERE `email` = '$email' AND `pass`='$pass'");
        $user_rass = $result->fetch_assoc();
        if (!empty($user_rass)){
            $msql->query("DELETE FROM `auth` WHERE `email` = '$email'");
            $msql->close();
            setcookie('user', '', time() - 3600, '/');
            setcookie('mail', '', time() - 3600, '/');
            echo "Аккаунт удалён <a href='/'>Назад.</a>";
            exit();
            $to = $email; 
            $subject = "=?utf-8?B?".base64_encode("Удаление аккаунта ")."?="; 
            $message = "<br> Привет мы получили от тебя запрос на удаление аккаунта! <br><br>Ваш аккаунт был удален с сайта sorav.ru";
            $headers  = "From: Удалялка <del_email@sorav.ru>\r\nReply-to: Админ <admin@sorav.ru>\r\nContent-type: text/html; charset=utf-8 \r\n"; 
            mail($to, $subject, $message, $headers); 
        }
        else if(empty($user_rass)){
            echo "Пароль не верный!";
        }
        else{
            $msql->close();
            echo $email ." почта не может быть удалена ,ведь аккаунт уже удален!  <a href='/'>Назад.</a>";
        }
    }
    else{
        echo "У вас нету куки с почтой";
    }
?>