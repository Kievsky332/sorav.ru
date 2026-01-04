 <?php
    date_default_timezone_set('Europe/Moscow');
    $date =  date("H:i");
    if ($date=="00:00"){
        require "setting.php";
        $msql = new mysqli($reacts[0],$reacts[1],$reacts[2],$reacts[3]);
        $msql->query("TRUNCATE TABLE `reacts`");
        $msql->close();
    }else{
        echo $date ;
        
    }
?>