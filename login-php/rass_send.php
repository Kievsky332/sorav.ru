 <?php
    date_default_timezone_set('Europe/Moscow');
    $date =  date("H:i",);
    if ($date == "12:00"){
        $msql = new mysqli("#","#","#","#");
        $sql = "SELECT * FROM `rass`";
        $result = $msql->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) 
                {
                   $email =  $row["rass"]; 
                    $to = $email; 
                    $tob = '?' . rawurlencode('email') . '=' . rawurlencode($email);
                    
                    $subject = "Пару позитивчика для тебя "; 
                    $b = mt_rand( 1, 20);
                    require_once("kiwi.php");
                    $c = $quotes[$b];
                    $message = $c."<br> Если хочешь отписатся <a href='sorav.ru/login-php/del_email.php$tob'>Кликини сюда!</a>";
                    
                    
                    $headers  = "Content-type: text/html; charset=utf-8 \r\n"; 
                    $headers .= "From: pozitiv@sorav.ru\r\n"; 
                    
                    mail($to, $subject, $message, $headers); 
                    sleep(2);
                }
                
        }
        else {
            $msql->close();
            echo "0 results";
        }
        $msql->close();
    }
?>