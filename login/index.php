<?php
            require_once "../partials/base.html";         
?>
        <?php
            require_once "../partials/header.php";
        ?>
        <center>
        <form action="../login-php/auth.php" method="post" >
            <div class="auth">
                <h1>Логин</h1>
                <input type="text" name="login" placeholder="Почта">
                <input type="password" name="pass" placeholder="пароль"><br>
                <input type="submit">
                <input type="reset">
            </div>
        </form>
        <form action="../login-php/check.php" method="post" >
            <div class="register">
            <h1>регистрация</h1>
                <input type="email" name="regemail" placeholder="почта">
                <input type="text" name="regname" placeholder="имя">
                <input type="password" name="regpass"  placeholder="Пароль">
                <input type="password" name="regrepass"  placeholder="Повторите пароль">
            </div>
            <br>
            <div>
                <input type="submit">
                <input type="reset">
            </div>
        </form></center>
    <?php
        require_once "../partials/footer.html";
    ?>