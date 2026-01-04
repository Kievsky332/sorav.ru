<?php
    require "../login-php/setting.php";
    $email = strip_tags($_GET['email']) ;
    $msql = new mysqli($users[0],$users[1],$users[2],$users[3]);
    $result  = $msql->query("SELECT * FROM `rass` WHERE `rass` = '$email'");
    $user_rass = $result->fetch_assoc();
    if (!empty($user_rass)){
        $msql->query("DELETE FROM `rass` WHERE `rass` = '$email'");
        $msql->close();
        echo "Почта удалена из рассылки <a href='/'>Назад.</a>";
        exit();
    }
    else{
        $msql->close();
        echo $email ." Почты уже нет в рассылке <a href='/'>Назад.</a>";
    }
?>