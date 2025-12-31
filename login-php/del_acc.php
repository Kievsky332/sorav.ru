<?php
            require_once "../partials/base.html";         
?>
<link rel="stylesheet" href="../css/style1.css">
        <?php
            require_once "../partials/header.php";
            $email = $_COOKIE['mail'];
        ?>
        <?php if (isset($_COOKIE['user']) || !empty($_COOKIE['user'])): 
    ?>
        <br><br>
        <form action="../login-php/del_acc_php.php" method="post" >
            <div>
                <center>
                    <input type="password" name="pass" class="input" placeholder="Текущий пароль."><br><br>
                    <p>Для потверждение напишите  "<?php echo $email ; ?>" в текстовом поле</p>
                    <input type="text"  id="email" class="input" placeholder="<?php echo $email ;?>" value="gg">
                    <br><input type="checkbox" id="checke" name="check" onclick="agreeForm(this.form)"><a>Я уверен/а</a>
                    <br><button class="submit" name="submit" disabled >Изменить.</button>
                </center>
            </div>
        </form>
        </p>
    <script>
     const el = document.getElementById("email");
   function agreeForm(f) {
    // Если поставлен флажок, снимаем блокирование кнопки
    if (f.check.checked & el.value=="<?php echo $email ;?>") f.submit.disabled = 0;
    // В противном случае вновь блокируем кнопку
    else f.submit.disabled = 1;
   }
  </script>
        <style>
        #checke{
            width: 20px;
            height: 20px;
        }
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
        .submit:disabled ,.submit:disabled:hover {
          background-color: grey;
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
/* Remove this container when use*/
.component-title {
  width: 100%;
  position: absolute;
  z-index: 999;
  top: 30px;
  left: 0;
  padding: 0;
  margin: 0;
  font-size: 1rem;
  font-weight: 700;
  color: #888;
  text-align: center;
}

/* The switch - the box around the slider */
.container {
  width: 51px;
  height: 31px;
  position: relative;
}

/* Hide default HTML checkbox */
.checkbox {
  opacity: 0;
  width: 0;
  height: 0;
  position: absolute;
}

.switch {
  width: 100%;
  height: 100%;
  display: block;
  background-color: #e9e9eb;
  border-radius: 16px;
  cursor: pointer;
  transition: all 0.2s ease-out;
}

/* The slider */
.slider {
  width: 27px;
  height: 27px;
  position: absolute;
  left: calc(50% - 27px/2 - 10px);
  top: calc(50% - 27px/2);
  border-radius: 50%;
  background: #FFFFFF;
  box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.15), 0px 3px 1px rgba(0, 0, 0, 0.06);
  transition: all 0.2s ease-out;
  cursor: pointer;
}

.checkbox:checked + .switch {
  background-color: #34C759;
}

.checkbox:checked + .switch .slider {
  left: calc(50% - 27px/2 + 10px);
  top: calc(50% - 27px/2);
}

        </style>
        <?php else:?>
            <p>У вас нету куки!</p>
        <?php endif;?>
    <?php
        require_once "../partials/footer.html";
    ?>