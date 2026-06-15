<?php
if(isset($_COOKIE['preference'])){
    require "setting.php";
    $emailrass = strip_tags($_POST["emailsub"]);
    $date =  date("Y-m-d");
    $msql = new mysqli($users[0],$users[1],$users[2],$users[3]);
    
    $result  = $msql->query("SELECT * FROM `rass` WHERE `rass` = '$emailrass'");
    $user_rass = $result->fetch_assoc();
    if (!empty($user_rass)){
        echo "Почта уже в рассылке <a href='/'>Назад.</a>";
        exit();
    }
    elseif (!empty($emailrass)){
        
            $pass = md5($b1.rand().$b2);
            $result  = $msql->query("SELECT * FROM `rass` WHERE `id` = '$pass'");
            $user = $result->fetch_assoc();
            while (!empty($user)){
                $pass = md5($b1.rand().$b2);
            }
        //`uid, '$pass'
        $msql->query("INSERT INTO `rass` (`date`,`rass`,`uid`)VALUES('$date','$emailrass','$pass')");
        echo "Почта теперь в рассылке <br>Мы рады что вы выбрали нас! <a href='/'>Назад.</a>";
    }
    else{
        echo "Не пустую почту! <a href='/'>Назад.</a>";
    }
$msql->close();
}
else{
    echo "Я запрещаю вам срать!";
};
    
   