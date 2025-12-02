<?php
            $data = include 'login-php/last_emoji.php'; 
            require_once "partials/base.html";            
?>

<link rel="stylesheet" href="css/style1.css">
<body>
    
    <div id="main">
        <?php
            require_once "partials/header.html";
        ?>
        <center><input type="image"     id="imglogo" src="https://cdn-icons-png.flaticon.com/512/10942/10942081.png" onclick="awu()"></center><br>
        <form action="../login-php/emoji-send.php" method="post" >
             <input type="hidden" id="emoter" name="emote" value="1">        
            <center><input type="submit" id="pon" value="Рассказать эмоции"> </center><br>
        </form>

        <div id="HI" class="divi">
            <center><h2>Всего:</h2></center>
            <div>
                <img class="menshe" src="https://cdn-icons-png.flaticon.com/512/10942/10942081.png">
                <p class="bolshe"><?php echo htmlspecialchars($data['pozy']); ?></p>
            </div><br>
            <div>
                <img class="menshe"  src="https://cdn-icons-png.flaticon.com/512/12657/12657875.png">
                <p class="bolshe"><?php echo htmlspecialchars($data['negativ']); ?></p>
            </div>
            <center><h3>Последнаяя реакция:</h3></center>
            <img class="menshe" 
    <?php 
    if ($data['last'] == 0) {
        echo "src='https://cdn-icons-png.flaticon.com/512/12657/12657875.png'";
    } else {
        echo "src='https://cdn-icons-png.flaticon.com/512/10942/10942081.png'";
    } 
    ?>
>
        </div>
        <div id="right11" class="divi">
            <img src="image.png" class="menshe">
           <center> <p class="bolshe">12379</p></center>
        </div>
        
    </div>
    <?php
        require_once "partials/footer.html";
    ?>
    <script src="main.js"></script>