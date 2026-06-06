<!DOCTYPE html>
<html lang="RU">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ЛОжь!</title>
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
	<div style="text-align: center;">
		<header>
			<h1>ОН ВАМ ВРАЛ!!</h1>
			<h1>Оставь отзыв о сайте </h1> <a href='https://forms.gle/czx9nspPJWsEqxu48'>Оставить отзыв</a>
		</header>    
		<img src='https://cdn-icons-png.flaticon.com/512/10942/10942081.png' style='width: 300px;height:300px;'>
		<p>На самом деле , это улыбающийся смайлик скрывает что-то...</p>
		<hr>
      <a href='#real'>реальность</a>
		<h1>Ваш позитив</h1>
		<center>
			
<?php 



require_once "login-php/kiwi.php";
foreach ($quotes as $key => $value) {
	echo "<div class='ggz' id='$key'><h1>$key</h1><p>$value</p></div>";
}; ?>	
		</center>
		<hr>
		<h1 id="real">Реальная история сайта:</h1><br>
		<h2>По словам разработчика:</h2>
		<p id='quote'>Сайт временно не работает из-за переноса на другой хостинг</p>
		<br>
		<h2>Реальность:</h2>
		<p id='quote'>Разработчик сайта просто устал его поддерживать.</p>
		<hr>
		<footer>
			<h1>Я успел перехватить связь, и забрать себе  сайт sorav.ru</h1>
			<p>Спасибо, всем кто прочитал разоблачение на разработчика sorav.ru</p>
		</footer>
	</div>
  <style>
    .ggz{
    background-color: rgba(0,0,0,0.3); 
     max-width: 400px;
    }
  </style>
</body>
</html>