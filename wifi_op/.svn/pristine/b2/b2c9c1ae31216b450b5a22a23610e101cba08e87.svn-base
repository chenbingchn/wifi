<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/wifi.css" rel="stylesheet" />
<div class="container top-Earn_colos">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="Earn_pic"><a href="index.php?r=site/earn_poins"><img src="images/Left.png" height="30" /></a></div>
            <div align="center" class="word">Earn poins</div>
            <div class="row" align="center" style="margin-top:40px;">
                <div class="col-md-5 col-sm-5 col-xs-5" align="right">
                    <img src="images/27.png" height="70" />
                </div>
                <div class="col-md-7 col-sm-7 col-xs-7">
                    <p class="top-word">My poins&nbsp;&nbsp;100<br /><span class="circle">Earn poins strategy</span></p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <h5>Daily tasks</h5>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 height">
            <div class="col-xs-8 col-sm-8 col-md-8"><h5 style="margin-top:15px;">Activities</h5></div>
            <div class="col-xs-4 col-sm-4 col-md-4"><img src="images/right.png" class="imgt" /></div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <h5>&nbsp;</h5>
        </div>
<?php
$i=1;
foreach($row as $k=>$v){
?>
    <div class="col-xs-12 col-sm-12 col-md-12 height">
        <div class="col-xs-8 col-sm-8 col-md-8"><h5><?=$v['title']?><br /><small><?=$v['Content']?></small></h5></div>
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="demoy"><?=$v['integral']?></div>&nbsp;<img src="images/right.png" class="imgr" /></div>
    </div>
<?php 
    if($i>=2) {
        if ($i % 3 == 0) {
        ?>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <h5>&nbsp;</h5>
            </div>
        <?php
        }
    }
    $i++;
}
?>
</div>
</div>