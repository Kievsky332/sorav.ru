 <?php
    date_default_timezone_set('Europe/Moscow');
    $date =  date("H:i");
    if ($date=="00:00"){
        require "../login-php/setting.php";
        $msql = new mysqli($users[0],$users[1],$users[2],$users[3]);
        $msql->query("TRUNCATE TABLE `reacts`");
        $msql->close();
    }else{
        echo $date ;
        
    }
?>