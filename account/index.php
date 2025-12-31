<?php
            require_once "../partials/base.html";         
?>
<link rel="stylesheet" href="../css/style1.css">

        <?php
            require_once "../partials/header.php";
        ?>
        <br>
        <?php if (!isset($_COOKIE['user']) || empty($_COOKIE['user'])): 
        ?>
            <a  href="../login" class="obsh" id="right1" >Логин / Регистрация</a>
                <?php else:?>
        <br><p><?=$_COOKIE['user']?>  ,что хотите сделать?</p>

        </p></center>
        <a href="../login-php/exit.php"><u>Выйти</u></a>
        <a href="../login-php/del_acc.php"><u>Удалить аккаунт</u></a>
        <a href="../login-php/change_pass.php"><u>Изменить пароль</u></a>
        <?php endif;?>
    <?php
        require_once "../partials/footer.html";
    ?>