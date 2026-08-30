<?php include_once(__DIR__ . "/../policity/cookies.php"); ?>   
    <body class="bg-[#101922] mt-[10px] text-white">
      <header>
          <a class="inline  text-white bg-[#272935] w-min px-[10px] py-[2px] rounded-[20px] font-semiboldborder-[3px] border-black" href="/">sorav.ru</a>
          <a class="inline underline text-[#1eaeb8] absolute left-[48%]" href="../somatic"><u>Статьи</u></a>
                  <?php if (!isset($_COOKIE['user']) || empty($_COOKIE['user'])): 
      ?>
          <a  href="../login" class="inline text-white bg-[#272935] w-min px-[15px] py-[2px] rounded-[20px] font-semibold absolute right-0" >Вход</a>
                  <?php else:?>
          <p  class="inline text-white bg-[#272935] w-min px-[15px] py-[2px] rounded-[20px] font-semibold absolute right-0" >Привет , <a href="../account/" class="underline text-[#1eaeb8] italic"><?=strip_tags($_COOKIE['user'])?>!</a></p>
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
      </header>