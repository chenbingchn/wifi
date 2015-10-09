<div class="container">
    <div id="nav">
        <div class="nav">
            <ul>
                <li class="cur"><a href="#">Hot</a></li>
                <?php if (isset($_GET['v']) && $_GET['v'] >= 205) { ?>
                    <li><a href="control?new=http://id.9apps.com/?app=99991" >Apps</a></li>
                <?php } else { ?>
                    <li><a href="control?new=http://m.detik.com" >News</a></li>
                <?php }?>
                <li><a href="control?new=http://m.kapanlagi.com" >Fun</a></li>
                <li><a href="control?new=http://wifiop.enmonet.com/wifi_op/trunk/basic/web/index.php?r=site/eladies" >Girls</a></li>
                <li><a href="control?new=http://www.9game.com" >Games</a></li>
            </ul>
            <div class="nav-line"></div>
        </div>
    </div>
    <hr class="hrstyle">
    <?php foreach($class as $k=>$v):?>
    <?php $cot = count($class)?>
    <?php $langC = 'Classname'.$lang;?>
    <?php $langT = 'title'.$lang;?>
    <div class="row">
        <div id="class<?=$k?>" class="col-lg-12" onclick="button(<?=$k?>,<?=$cot?>)">
            <div class="mainclass">
                <span><img src="<?=$this->config->base_url()?>images/<?=$v->icon?>" width="22"></span>
                <span><?=$v->$langC?></span>
                <b style="float: right;">
                    <span id="icon<?=$k?>" class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </b>
            </div>
            </div>
        <div id="cat<?=$k?>" class="cot col-lg-12">
            <hr class="hrstyle">
            <?php foreach($cat as $c=>$t):?>
                <?php if($t->pid == $v->pid):?>
                    <div class="maincategory" onclick="pushurl(<?=$t->url?>)"><?=$t->$langT?></div>
                <?php endif?>
            <?php endforeach?>
        </div>
    </div>
        <hr class="hrstyle">
    <?php endforeach?>
</div>
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
    ga('create', 'UA-66242547-2', 'auto');
    ga('send', 'pageview');
</script>
<?php
if (count($ban)) {
    echo '<div class="banners swiper-container"><div class="swiper-wrapper">';
    foreach($ban as $k => $v) {
        echo '<div class="swiper-slide swiper-no-swiping"><a href="' . $v->url . '"><img src="' . $v->pic_url . '" style="width:100%;"></a></div>';
    }
    echo '</div><img class="close-btn" src="'.$this->config->base_url().'images/discovery/close.png" width="30" height="30"></div>';
}
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.1.2/js/swiper.min.js"></script>
<script>new Swiper ('.swiper-container', {autoplay:3000},{noSwiping : true});</script>