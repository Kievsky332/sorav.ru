<?php
            require_once "../partials/base.html";         
?>

        <?php
            require_once "../partials/header.php";
        ?>
        <br>
        <?php if (!isset($_COOKIE['user']) || empty($_COOKIE['user'])): 
        ?>
            <a  href="../login"  >Логин / Регистрация</a>
                <?php else:?>
        <br><p><?=$_COOKIE['user']?>  ,что хотите сделать?</p>

        </p></center>
        <a href="../login-php/exit.php" class="underline text-[#1eaeb8]">Выйти</a>
        <a href="../login-php/del_acc.php" class="underline text-[#1eaeb8]">Удалить аккаунт</a>
        <a href="../login-php/change_pass.php" class="underline text-[#1eaeb8]">Изменить пароль</a>
        <?php endif;?>
    <?php
        require_once "../partials/footer.html";
    ?>