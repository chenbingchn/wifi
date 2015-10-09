<?php

$lang=count($row);
?>
<div class="navl head">
    <div class="headtitle">
        <div class="headtitleleft" onclick="buttono()"><img id="left" src="<?=$this->config->base_url()?>images/earn_poins/Left.png" height="30" /></div>
        <div class="headtitleword"><?=$this->lang->line('Earn points')?></div>
    </div>
    <div style="margin-top: 40px;">
        <p style="padding-right: 1%;"><img src="<?=$this->config->base_url()?>images/earn_poins/webdollar.png" height="70"  onclick="ToLogin()" /></p>
        <div class="top-word">
            <p style="margin-bottom: 10px;"><?=$this->lang->line('My points')?>&nbsp;&nbsp;<span id="integral"></span><span id="integrals"></span></p>
            <span id="button" class="circle" onclick="EarnPoins()"><?=$this->lang->line('How to earn points ?')?></span>
        </div>
    </div>
</div>

<div id="view" class="contentrs">
    <?php if ($activity && $activity->activity_url): ?>
    <a href="<?= $activity->activity_url ?>">
        <div id="activities" class="list" style="height: 45px;">
            <div class="words" style="padding-top: 8px;"><?=$this->lang->line('Current Activities')?></div>
            <div class="lets">&nbsp;</div>
        </div>
    </a>
    <?php endif; ?>
    <div class="listNull">&nbsp;</div>
<?php
$i=1;
foreach($row as $k=>$v) {
?>
        <?php if ($version >= $v->minVersion): ?>
            <div id="list<?= $k ?>" class="list" onclick="colorb(<?= $k ?>,<?= $i ?>)">
                <a href="javascript:;" style="color:#000">
                    <div class="words"><h5><div class="texts"><?= $v->$langT ?></div><small><?= $v->$langC ?></small></h5></div>
                    <div class="show">
                        <div class="les">&nbsp;</div>
                        <div id="rig<?= $k ?>" class="rig"><?= $v->integral ?></div>
                    </div>
                </a>
            </div>
        <?php endif; ?>
<?php
    if($i >= 2 && $i % 2 == 0){
        if($lang/$i != 1) {
            echo '<div id="lint'.$i.'" class="listNull">&nbsp;</div>';
        }
    }
    $i++;
}
?>
</div>

<?php
if($str['user'] != -1){

    if(count($str['name']) != 0){

        echo '<script>document.getElementById("integrals").style.display="none";</script>';

        if($str['sharewifi'] != NULL){
            echo '<script>document.getElementById("rig0").style.backgroundColor="#cccccc";</script>';
        }
        if($str['sharefrd'] != NULL){
            echo '<script>document.getElementById("rig1").style.backgroundColor="#cccccc";</script>';
        }

        $photo=$str['name'][0]->avatar;
        if($photo != NULL){
            echo '<script>document.getElementById("rig2").style.backgroundColor="#cccccc";</script>';
            echo '<script>document.getElementById("list2").onclick="return false";</script>';
        }
        if(($str['name'][0]->age && $str['name'][0]->gender && $str['name'][0]->user_name) != NULL) {
            echo '<script>document.getElementById("rig3").style.backgroundColor="#cccccc";</script>';
            echo '<script>document.getElementById("list3").onclick="return false";</script>';
        }
    }
}
if($str['imei'] != -1){
    if($str['integral'] == NUll){
        echo '<script>document.getElementById("integral").innerHTML="0";</script>';
        echo '<script>document.getElementById("integrals").style.display="none";</script>';
    }else{
        echo '<script>document.getElementById("integrals").innerHTML='.$str['integral'][0]->counter.';</script>';
        echo '<script>document.getElementById("integral").style.display="none";</script>';
    }

    if($str['sharewifi'] != NULL){
        echo '<script>document.getElementById("rig0").style.backgroundColor="#cccccc";</script>';
    }
    if($str['sharefrd'] != NULL){
        echo '<script>document.getElementById("rig1").style.backgroundColor="#cccccc";</script>';
    }
}

switch($str['type']){
    case 0 :
        echo '<script>document.getElementById("rig4").style.backgroundColor="#cccccc";</script>';
        echo '<script>document.getElementById("list4").onclick="return false";</script>';
        break;
    case 2 :
        echo '<script>document.getElementById("rig5").style.backgroundColor="#cccccc";</script>';
        echo '<script>document.getElementById("list5").onclick="return false";</script>';
        break;
    case 1 :
        echo '<script>document.getElementById("rig4").style.backgroundColor="#cccccc";</script>';
        echo '<script>document.getElementById("list4").onclick="return false";</script>';
        echo '<script>document.getElementById("rig5").style.backgroundColor="#cccccc";</script>';
        echo '<script>document.getElementById("list5").onclick="return false";</script>';
        break;
}
?>