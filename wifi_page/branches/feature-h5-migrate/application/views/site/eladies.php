<div id="div1" class="container cont">
    <div class="row" align="center">
        <?php foreach ($pic as $k=>$v): ?>
            <div id="show" class="col-md-12 col-sm-12 col-xs-12">
                <div class="key"><?=$v->id?></div>
                <div class="images">
                    <img src="<?=$v->url?>" class="img" />
                </div>
            </div>
            <div class="clear">&nbsp;</div>
        <?php endforeach; ?>
    </div>
</div>
<!--<script>-->
<!--    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){-->
<!--        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),-->
<!--        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)-->
<!--    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');-->
<!---->
<!--    ga('create', 'UA-66242547-3', 'auto');-->
<!--    ga('send', 'pageview');-->
<!---->
<!--</script>-->