<?php 
 $emo = strip_tags($_POST["agree"]);
 if ($emo=="yes"){
     setcookie('preference',"yes",time() +60*60*24*31 , "/"); 
    header("Location: /");
 };
 ?>