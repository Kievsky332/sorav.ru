<?php
            $data = include 'login-php/last_emoji.php'; 
            require_once "partials/base.html";            
?>

<link rel="stylesheet" href="../css/style1.css">
    
        <?php
            require_once "partials/header.php";
        ?>
        <center><input type="image"     id="imglogo" src="https://cdn-icons-png.flaticon.com/512/10942/10942081.png" onclick="awu()"></center><br>
        <form action="../login-php/emoji-send.php" method="post" >
             <input type="hidden" id="emoter" name="emote" value="1">
             <?php
             function getClientIp() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP']; // IP от клиента (редко)
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR']; // IP через прокси/балансировщик
    } else {
        $ip = $_SERVER['REMOTE_ADDR']; // IP самого сервера (если нет прокси)
    }
    return $ip;
}
$user_ip = getClientIp();
    $date =  date("Y-m-d H:i:s");
    $msql = new mysqli("#","#","#","#");
    $result = $msql->query("SELECT COUNT(*) FROM `reacts` WHERE `ip` = '$user_ip'");
    $row = $result->fetch_assoc(); // Fetches one row as an associative array
    $ip = $row['COUNT(*)'];
if ($ip>0) {
    echo '<center><input type="submit" id="pon" value="Подождите 24 часа" disabled> </center>';
} else {
    echo '<center><input type="submit" id="pon" value="Рассказать эмоции"> </center>';
}
$msql->close();
?>
        </form>

        <div id="HI" class="divi">
            <center><h2>За сегодня:</h2></center>
            <div>
                <img class="menshe" src="https://cdn-icons-png.flaticon.com/512/10942/10942081.png">
                <p class="bolshe"><?php echo htmlspecialchars($data['pozy']); ?></p>
            </div><br>
            <div>
                <img class="menshe"  src="https://cdn-icons-png.flaticon.com/512/12657/12657875.png">
                <p class="bolshe"><?php echo htmlspecialchars($data['negativ']); ?></p>
            </div>
            <center><h3>Последнаяя реакция:</h3></center>
            <img class='menshe'src=
    <?php 
    if ($data['last'] == 0) {
        echo "'https://cdn-icons-png.flaticon.com/512/12657/12657875.png'";
    }  else  {
        echo "'https://cdn-icons-png.flaticon.com/512/10942/10942081.png'";
    } 
    ?>
    >

        </div>
        <div id="right11" class="divi">
            <p>Онлайн:</p>
            <script id="_waul0d">var _wau = _wau || []; _wau.push(["dynamic", "uk1uycuo0k", "l0d", "c4302bffffff", "small"]);</script><script async src="//waust.at/d.js"></script>
            <!-- Histats.com  START (html only)-->
            <a href="/viewstats/?SID=4996152&f=2" alt="" target="_blank" ><div id="histatsC"><img border="0" src="//s4is.histats.com/stats/i/4996152.gif?4996152&103"></div></a>
<!-- Histats.com  END  -->
        </div>
        
    </div>

    <script src="main.js"></script>
    <?php
        require_once "partials/footer.html";
    ?>