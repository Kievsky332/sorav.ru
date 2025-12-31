<?php
    require("setting.php");
    $msql = new mysqli($reacts[0],$reacts[1],$reacts[2],$reacts[3]);

    $ab = $msql->query("SELECT Sadly FROM `reacts` WHERE Id = (SELECT MAX(Id) FROM reacts)");
    $aa = $msql->query("SELECT COUNT(*) FROM `reacts` WHERE `Sadly` =1;");
    $ac = $msql->query("SELECT COUNT(*) FROM `reacts` WHERE `Sadly` =0;");

    $row = $ab->fetch_assoc();
    $row1 = $aa->fetch_assoc();
    $row2 = $ac->fetch_assoc();

    $b = $row1['COUNT(*)'];
    $c = $row2['COUNT(*)'];
 
    if (empty($row['Sadly'])){
        $a = 0;
    }
    else{
        $a = $row['Sadly'];
    }
    $ui = [
    "last" => $a,
    "pozy" => $b,
    "negativ" => $c
    ];
    return $ui;
    $msql->close();
?>