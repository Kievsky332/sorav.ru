       
    <div id="main">
        <link rel="stylesheet" href="../css/head_style.css">
        <header>
            <a class="obsh" id="logo" href="/">sorav.ru</a>
            <a id="center1" href="../somatic">Грусть или счастье?</a>
                <?php if (!isset($_COOKIE['user']) || empty($_COOKIE['user'])): 
    ?>
            <a  href="../login" class="obsh" id="right1" >Логин / Регистрация</a>
                <?php else:?>
        <p  class="obsh" id="right1">Привет , <?=$_COOKIE['user']?>! <br> <br><a href="../login-php/exit.php"><u>Выход</u></a>.</p>
    <?php endif;?>
        
        
        
                <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-9TNFH4YCWK"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-9TNFH4YCWK');
</script>
        <!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function(m,e,t,r,i,k,a){
        m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
        m[i].l=1*new Date();
        for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
        k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)
    })(window, document,'script','https://mc.yandex.ru/metrika/tag.js?id=105682360', 'ym');

    ym(105682360, 'init', {ssr:true, webvisor:true, clickmap:true, ecommerce:"dataLayer", accurateTrackBounce:true, trackLinks:true});
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/105682360" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->

<script>
  // Initialize the agent on page load.
  const fpPromise = import('https://fpjscdn.net/v3/6Kfm8i7tkJ5NctWR8NtV')
    .then(FingerprintJS => FingerprintJS.load({
      region: "eu"
    }))

  // Get the visitorId when you need it.
  fpPromise
    .then(fp => fp.get())
    .then(result => {
      const visitorId = result.visitorId
      console.log(visitorId)
    })
</script>
    </header>