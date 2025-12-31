<?php
            require_once "../partials/base.html";         
?>
        <?php
            require_once "../partials/header.php";
        ?>
        <?php
            if (empty(($_GET['st']))): 
        ?>
        <link rel="stylesheet" href="../css/style1.css">
        <center><p>Статьи:</p></center>
        <ol>
            <a href="?st=1"><li>Как не довести себя до критики</li></a>
            <a href="?st=2"><li>Гузилов г. а. история успеха</li></a>
            <a href="?st=3"><li>Лисавина 💖 и наш любимый C#</li></a>
        </ol>
        

        <?php elseif($_GET['st']):?>
        <?php 
        $a = $_GET['st'];
        if (file_exists("../st/$a.html")) {
            echo "<style>img{width:500px}</style>";
            require_once "../st/$a.html";
        } else {
            echo '<link rel="stylesheet" href="../css/style1.css"><br><br><br><center>Такой статьи ещё нету!</center><style>center{color:red;}</style>';
        }
        ?>
        
 
        <?php endif;?>
        
    <?php
        require_once "../partials/footer.html";
    ?>