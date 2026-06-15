<?php
            $data = require 'login-php/last_emoji.php'; 
            require_once "partials/base.html";   
            require "login-php/setting.php";  
?>
        <?php 
        $a = $_GET['lazy']??"";
        $b = [
            "" => "",
            1 => "<script>alert('Взлом - это плохо!');</script>",
            2 => "<script>alert('Вы не согласились!');</script>",
            3 => "<script>alert('Вы уже отправляли');</script>",
            4 => "<script>alert('Спасибо,что отправили');</script>"
        ];
        if ($a>4){
            $c = "<script>alert('Взлом - это плохо!');</script>";
        }else{
            $c = $b[$a];
        };
        
        
        ?>
    
        <?php
            require_once "partials/header.php";
        ?>
  
        <center><input type="image"     class="mt-[100px] w-[200px] h-[200px]" src="https://cdn-icons-png.flaticon.com/512/10942/10942081.png" onclick="awu()"></center><br>
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
            $msql = new mysqli($reacts[0],$reacts[1],$reacts[2],$reacts[3]);
            $result = $msql->query("SELECT COUNT(*) FROM `reacts` WHERE `ip` = '$user_ip'");
            $row = $result->fetch_assoc(); // Fetches one row as an associative array
            $ip = $row['COUNT(*)'];
        if ($ip>0) {
            echo '<center><input type="submit" class="bg-[#51bcbc] text-black text-center border-[3px] border-black rounded-[50px] px-[10px] py-[5px] text-[20px]" value="Подождите 24 часа"></center>';
        } else {
            echo '<center><input type="submit" class="bg-[#51bcbc] text-black text-center border-[3px] border-black rounded-[50px] px-[10px] py-[5px] text-[20px]" value="Рассказать"></center>';
        }
        $msql->close();
        ?>
        </form>

        <div class="bg-[#272935] inline-block text-white w-fit px-[20px] py-[5px] rounded-[20px]">
            <h2 class="text-center">За сегодня:</h2>
            <div>
                <img class="w-[100px] inline" src="https://cdn-icons-png.flaticon.com/512/10942/10942081.png">
                <p class="inline"><?php echo htmlspecialchars($data['pozy']); ?></p>
            </div><br>
            <div>
                <img class="w-[100px] inline"  src="https://cdn-icons-png.flaticon.com/512/12657/12657875.png">
                <p class="inline"><?php echo htmlspecialchars($data['negativ']); ?></p>
            </div>
            <h3 class="text-center">Последняя реакция:</h3>
            <img class="w-[100px]" src=
    <?php 
    if ($data['last'] == 0) {
        echo "'https://cdn-icons-png.flaticon.com/512/12657/12657875.png'";
    }  elseif($data['last'] == 1)  {
        echo "'https://cdn-icons-png.flaticon.com/512/10942/10942081.png'";
    }else{
    	echo "'https://cdn-icons-png.flaticon.com/512/43/43625.png'";
    }
    ?>
    >

        </div>
        <div  class="bg-[#272935]  absolute right-0 top-0flex w-64 ml-auto inline-block  w-min bottom-[10px] text-white px-[20px] py-[5px] rounded-[20px]">
            <p>Онлайн:</p>
            <script id="_waul0d">var _wau = _wau || []; _wau.push(["dynamic", "uk1uycuo0k", "l0d", "c4302bffffff", "small"]);</script><script async src="//waust.at/d.js"></script>
            <!-- Histats.com  START (html only)-->
            <a href="/viewstats/?SID=4996152&f=2" alt="" target="_blank" ><div id="histatsC"><img border="0" src="//s4is.histats.com/stats/i/4996152.gif?4996152&103"></div></a>
<!-- Histats.com  END  -->
        </div>
        

    <script src="main.js"></script>
    <?php echo $c; ?>
    <?php
        require_once "partials/footer.html";
    ?>