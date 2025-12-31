<?php
            require_once "../partials/base.html";         
?>
        <?php
            require_once "../partials/header.php";
        ?>
        
        <center>
        <?php if (!isset($_COOKIE['user']) || empty($_COOKIE['user'])): ?>
            <?php 
require "../login-php/setup.php";
?><br>
<div class="google"><a href="<?= $client->createAuthUrl(); ?>">
          <svg stroke="currentColor" fill="currentColor" stroke-width="0" version="1.1" x="0px" y="0px" class="google-icon" viewBox="0 0 48 48" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
            <path fill="#FFC107" d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12
	c0-6.627,5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,24
	c0,11.045,8.955,20,20,20c11.045,0,20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z"></path>
            <path fill="#FF3D00" d="M6.306,14.691l6.571,4.819C14.655,15.108,18.961,12,24,12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657
	C34.046,6.053,29.268,4,24,4C16.318,4,9.656,8.337,6.306,14.691z"></path>
            <path fill="#4CAF50" d="M24,44c5.166,0,9.86-1.977,13.409-5.192l-6.19-5.238C29.211,35.091,26.715,36,24,36
	c-5.202,0-9.619-3.317-11.283-7.946l-6.522,5.025C9.505,39.556,16.227,44,24,44z"></path>
            <path fill="#1976D2" d="M43.611,20.083H42V20H24v8h11.303c-0.792,2.237-2.231,4.166-4.087,5.571
	c0.001-0.001,0.002-0.001,0.003-0.002l6.19,5.238C36.971,39.205,44,34,44,24C44,22.659,43.862,21.35,43.611,20.083z"></path>
          </svg>
          <span>Вход по гуглу</span>
        </a></div>
<br>
        <form action="../login-php/auth.php" method="post" >
            <div class="auth">
                <h1>Логин</h1>
                <input class="input"  type="text" name="login" placeholder="Почта">
                <input class="input" type="password" name="pass" placeholder="пароль"><br><br>
                <input class="button" type="submit">
                <input class="button" type="reset">
            </div>
        </form>
        <hr>
        <form action="../login-php/check.php" method="post" >
            <div class="register">
            <h1>регистрация</h1>
                <input type="email" name="regemail" class="input"  placeholder="почта">
                <input type="text" name="regname" class="input" placeholder="имя">
                <input type="password" name="regpass" class="input"  placeholder="Пароль">
                <input type="password" name="regrepass" class="input"  placeholder="Повторите пароль">
            </div>
            <br>
            <div>
                <input class="button" type="submit">
                <input class="button" type="reset">
            </div>
        </form><br>
        <style>
            .button {
                color: #090909;
                padding: 0.3em 1.7em;
                font-size: 18px;
                border-radius: 0.5em;
                background: #e8e8e8;
                border: 1px solid #e8e8e8;
                transition: all 0.3s;
            }
                    
            .button:active {
                color: #666;
                box-shadow: inset 4px 4px 12px #c5c5c5, inset -4px -4px 12px #ffffff;
            }
            .input {
            color: white;
             border: 2px solid #e8e8e8;
             padding: 15px;
             border-radius: 10px;
             background-color: #212121;
             font-size: small;
             font-weight: bold;
             text-align: center;
            }

            .input:focus {
             outline-color: white;
             background-color: #212121;
             color: white;
             box-shadow: 5px 5px #888888;
            }

            .google{
                background-color:#62728c;
                border-radius:20px;
                max-width:fit-content;
                padding:10px;
            }
            </style>
                <?php else:?>
            <p>Вы уже зарегистрированы/залогинины!</p>
        <?php endif;?>
        </center>
    <?php
        require_once "../partials/footer.html";
    ?>