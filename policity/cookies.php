                <?php if (!isset($_COOKIE['preference']) || empty($_COOKIE['preference'])): 
    ?>
<center><div class="card">

  <p class="cookieHeading">Пользовательское соглашение.</p>
  <p class="cookieDescription">Мы используем куки и данные для яндекс метрики <br><br><input type="checkbox" id="check"> Я ознакомился с<a href="../policity/"> <u>пользовательским соглашением</u></a>.</p>

  <div class="buttonContainer">
<form action="../policity/agree.php" method="post" >
        <button class="acceptButton" id="sbm" name="agree" value="yes" disabled="">Разрешаю</button>
</form>
    <a href="https://clck.ru/3NhmSt"><button class="declineButton">Запрещаю</button></a>
  </div>
  

</div></center>
<style>

/* From Uiverse.io by 00Kubi */ 
.card {
  width:100vw;
  height: 100vh;
  background-color: rgba(0, 0, 0, 0.93);
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  position:  fixed;

}





.cookieHeading {
  font-size: 30px;
  font-weight: 800;
  color: white;
}

.cookieDescription {
  text-align: center;
  font-size: 20px;
  font-weight: 600;
  color: white;
}

.cookieDescription a {
  --tw-text-opacity: 1;
  color:white;
}

.cookieDescription a:hover {
  -webkit-text-decoration-line: underline;
  text-decoration-line: underline;
}

.buttonContainer {
  display: flex;
  gap: 20px;
  flex-direction: row;
}

.acceptButton {
  width: 80px;
  height: 30px;
  background-color: #57565c;
  transition-duration: .2s;
  border: none;
  color: rgb(241, 241, 241);
  cursor: pointer;
  font-weight: 600;
  border-radius: 20px;
  box-shadow: 0 4px 6px -1px #977ef3, 0 2px 4px -1px #977ef3;
  transition: all .6s ease;
}
.acceptButton:enabled {
  width: 80px;
  height: 30px;
  background-color: #7b57ff;
  transition-duration: .2s;
  border: none;
  color: rgb(241, 241, 241);
  cursor: pointer;
  font-weight: 600;
  border-radius: 20px;
  box-shadow: 0 4px 6px -1px #977ef3, 0 2px 4px -1px #977ef3;
  transition: all .6s ease;
}
.declineButton {
  width: 80px;
  height: 30px;
  background-color: #dadada;
  transition-duration: .2s;
  color: rgb(46, 46, 46);
  border: none;
  cursor: not-allowed;
  font-weight: 600;
  border-radius: 20px;
  box-shadow: 0 4px 6px -1px #bebdbd, 0 2px 4px -1px #bebdbd;
  transition: all .6s ease;
}

.declineButton:hover {
  background-color: #ebebeb;
  box-shadow: 0 10px 15px -3px #bebdbd, 0 4px 6px -2px #bebdbd;
  transition-duration: .2s;
}

.acceptButton:hover {
  box-shadow: 0 10px 15px -3px #977ef3, 0 4px 6px -2px #977ef3;
  transition-duration: .2s;
}
</style>
<script src="../policity/script.js"></script>
                <?php else:?>

    <?php endif;?>