<?php
            require_once "../partials/base.html";         
?>
<link rel="stylesheet" href="../css/style1.css">
        <?php
            require_once "../partials/header.php";
        ?>
        <?php if (isset($_COOKIE['user']) || !empty($_COOKIE['user'])): 
    ?>
        <br><br>
        <?php 
        $a = $_GET['lazy']??"";
        $b = [
            "" => "",
            1 => "Пароль изменен",
            2 => "Старый пароль не сходится!",
            3 => "Новые пароли не сходятся" ,
            4 => "Ошибка!",
            5 => "У вас нету куки с почтой"
        ];
        if ($a>5){
            $c = "<script>alert('Взлом - это плохо!');</script>";
        }else{
            $c = $b[$a];
        };

        echo "<center><p style='color:red;'><b>$c</b></p></center>";
        ?>
        <form action="../login-php/change_pass_php.php" method="post" >
            <div>
                <center>
                    <input type="password" name="pass" class="input" placeholder="Текущий пароль."><br><br>
                    <input type="password" name="newpass" class="input" placeholder="Новый пароль">
                    <input type="password" name="newpass1" class="input" placeholder="Новый пароль ,ещё раз!">
                    <br><button class="submit">Изменить.</button>
                </center>
            </div>
        </form>
        <style>
        .submit {
          border: none;
          outline: none;
          padding: 10px;
          border-radius: 10px;
          color: #fff;
          font-size: 16px;
          transform: .3s ease;
          background-color: #00bfff;
        }
        
        .submit:hover {
          background-color: #00bfff96;
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
        </style>
        <?php else:?>
            <p>У вас нету куки!</p>
        <?php endif;?>
    <?php
        require_once "../partials/footer.html";
    ?>
