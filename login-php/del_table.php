 <?php
    date_default_timezone_set('Europe/Moscow');
    $date =  date("H:i");
    if ($date=="00:00"){
        $msql = new mysqli("#","#","#","#");
        $msql->query("TRUNCATE TABLE `reacts`");
        $msql->close();
    }else{
        echo $date ;
        
    }
?>