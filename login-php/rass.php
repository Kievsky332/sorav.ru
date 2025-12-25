<?php
    $emailrass = ($_POST["emailsub"]);
    $date =  date("Y-m-d");
    $msql = new mysqli("#","#","#","#");
    $result  = $msql->query("SELECT * FROM `rass` WHERE `rass` = '$emailrass'");
    $user_rass = $result->fetch_assoc();
    if (!empty($user_rass)){
        echo "Почта уже в рассылке <a href='/'>Назад.</a>";
        exit();
    }
    elseif (!empty($emailrass)){
        $msql->query("INSERT INTO `rass` (`date`,`rass`)VALUES('$date','$emailrass')");
        echo "Почта теперь в рассылке <br>Мы рады что вы выбрали нас! <a href='/'>Назад.</a>";
    }
    else{
        echo "Не пустую почту! <a href='/'>Назад.</a>";
    }
$msql->close();
    
   