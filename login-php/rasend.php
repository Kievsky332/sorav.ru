<?php
date_default_timezone_set('Europe/Moscow');
$date = date("H:i");
require("kiwi.php");
    if($date=="08:00"){
        require "setting.php";
        $msql = new mysqli( $users[0],$users[1],$users[2],$users[3]);
        $sql = "SELECT * FROM `rass`";
        $result = $msql->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) 
                {
                    $uid =  $row["uid"]; 
                    $email =  $row["rass"]; 
                    $to = $email; 
                    $tob = '/' . rawurlencode($uid);
                    
                    $subject = "=?utf-8?B?".base64_encode("Позитив 😀")."?="; 
                    $b = mt_rand( 1, 150);
                    $c = $quotes[$b];
                    $message = $c."<br> Если хочешь отписаться <a href='sorav.ru/login-php/del_email.php$tob'>Кликини сюда!</a>";
                    
                    
                    $headers  = "From: Позитив <pozitiv@sorav.ru>\r\nReply-to: Админ <admin@sorav.ru>\r\nContent-type: text/html; charset=utf-8 \r\n"; 
                    $headers .= "List-Unsubscribe: <https://sorav.ru/login-php/del_email.php$tob>" . "\r\n";
                    $headers .= "List-Unsubscribe-Post: List-Unsubscribe=One-Click" . "\r\n";
                    mail($to, $subject, $message, $headers); 
                    sleep(1);
                }
              
        }
       
        else {
            $msql->close();
            echo "0 results";
        }
        $msql->close();
    }
    
    else{
        echo $date ;
    }
?>