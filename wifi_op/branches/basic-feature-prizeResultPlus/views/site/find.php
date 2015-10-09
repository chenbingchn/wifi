<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/menus.css" rel="stylesheet" />
<link rel="stylesheet" href="css/swiper.min.css">
<script src="js/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/demo.css" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link href="css/bootstrap.min.css" rel="stylesheet">


<div class="contents">
    <div id="nav">
        <div class="nav" align="center">
            <ul>
                <?php if (isset($_GET['v']) && $_GET['v'] >= 206) { ?>
                    <li class="cur"><span>Apps</span></li>
                <?php } else { ?>
                    <li class="cur"><a  href="#">Navi</a></li>
                <?php }?>
                <li><a href="#" data-url="index.php?r=site/control&url=zixun&title=News&new=http://m.detik.com" >News</a></li>
                <li><a href="#" data-url="index.php?r=site/control&url=gaoxiao&new=http://m.kapanlagi.com" >Fun</a></li>
                <li><a href="#" data-url="index.php?r=site/control&url=meinv&new=http://wifiop.enmonet.com/wifi_op/trunk/basic/web/index.php?r=site/eladies" >Girls</a></li>
                <li><a href="#" data-url="index.php?r=site/control&url=youxi&new=http://www.9game.com" >Games</a></li>
            </ul>
            <div class="nav-line"></div>
        </div>
    </div>
    <div>
        <?php if (isset($_GET['v']) && $_GET['v'] >= 206) { ?>
            <iframe src="http://www.9apps.com/?app=99991" width="100%" height="100%" frameborder="0"  scrolling="auto" style="position: absolute; height: 100%; border: none"></iframe>
        <?php } else {
            echo $this->render('home',['class' => $class, 'categorys' => $categorys,'find' => $find, 'show'=>$show]);
        } ?>
    </div>
</div>


<script>
    function turnoff(obj){
        document.getElementById(obj).style.display="none";
    }
    $(function() {
        $('.nav li').not('.cur').on('click', function() {
            var url = $(this).find('a').attr('data-url');
            var navLine = $('.nav-line'),
                w = $(this).width(),
                left = $(this).position().left;
            navLine.animate({'width': w, 'left': left}, 100,function(){
                window.location.href  = url;
            });
        });
        $('.close-btn').on('touchstart click', function(e) {
            e.stopImmediatePropagation();
            $('.banners').hide();
        });
    });

  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-66242547-2', 'auto');
  ga('send', 'pageview');
</script>


<?php
    if(count($show)) {
?>

<div id="push" class=" navl">
    <div class="lefts view">
        <ul>

<?php
foreach($show as $k=>$v) {
    echo '<li>';
    echo '<div class="main">';
    echo '<div style="float: left; padding-left: 15px;"><img src="'.$v['app_img'].'" width="35px"></div>';
    echo '<div class="viewword"><p>'.$v['product'].'<br><span class="viewsize">'.$v['content'].'</span></p></div>';
?>

    <div class="closes">
        <a href="#" style="color: #ffffff" onclick="javascript:turnoff('push')">X</a>
    </div>

<?php
    echo '<div class="link"><a href="'.$v['url'].'" style="color: #ffffff;">打开</a></div>';
    echo '</div>';
    echo '</li>';
}
?>
        </ul>
    </div>
</div>
<?php
}
?>

<?php
    if (count($banners) && isset($_GET['v']) && $_GET['v'] >= 206) {
        echo '<div class="banners swiper-container"><div class="swiper-wrapper">';
        foreach($banners as $k => $v) {
            echo '<div class="swiper-slide swiper-no-swiping"><a href="javascript:window.intent.showWeb(\'' . $v['url'] . '\')"><img src="' . $v['pic_url'] . '" style="width:100%;"></a></div>';
        }
        echo '</div><img class="close-btn" src="images/close.png" width="30" height="30"></div>';
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.1.2/js/swiper.min.js"></script>
<script>new Swiper ('.swiper-container', {autoplay:3000});</script>
<?php } ?>