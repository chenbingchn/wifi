<?php
use app\models\Integral;

Yii::$app->language =$language; 
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>积分兑换首页</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=0">
        <meta name="description" content="points mall">
        <link rel="stylesheet" href="css/pointmall.css" type="text/css" media="screen" charset="utf-8"/>
    </head>
    <body>
        <!-- content here -->
        <div class="nav row">
            <div class="back pull-left"></div>
            <div class="title"><?=Yii::t('translate', 'Points  Mall'); ?></div>
        </div>
        <div class="user">
            <!--登录前-->
            <?php if (!$user) { ?>
                <div class="login">
                    <div class="head pull-left">
                        <div class="login-ico"></div>
                        <span><?=Yii::t('translate', 'Login'); ?></span>
                    </div>
                    <div class="gold pull-right">
                        <div class="point"></div>
                        <span>0</span>
                    </div>
                </div>
            <?php } else { ?>
                <!--登录前状态结束-->
                <!--登录后-->
                <div class="userinfo">
                    <div class="head pull-left">
                        <div class="login-ico">
                            <img src="<?php if($user->avatar){  echo $user->avatar;}else{ echo "images/icon/icon-1.png";}?>" alt="" width="32">
                        </div>
                        <span><?php if($user->user_name){ echo $user->user_name;}else{ echo $user->phone_number;}?></span>
                    </div>
                    <div class="gold pull-right">
                        <div class="point"></div>
                        <span><?php if($user->score){ echo $user->score->counter;}else{ echo 0;} ?></span>
                    </div>
                </div>
            <?php } ?>
            <!--登录后状态结束-->
        </div>
        
  
<?php
if ($banner) {
    echo '<div class="adimg swiper-container"><div class="swiper-wrapper">';
    foreach ($banner as $k => $v) {
        echo '<div class="swiper-slide swiper-no-swiping"><a href="'.$v->url.'"><img src="' . $v->pic_url . '" style="width:100%;"></a></div>';
    }
    echo '</div></div>';
}
?>


        <!--兑奖帮助登录前 ico改为loginedico 极为登录后 或使用另外样式-->
        <div class="row exchanged">
            <div class="history">
                <div class="ico"></div>
                <?php if ($user) { ?>
                    <span><a style="color: #333" href="<?= Yii::$app->urlManager->createUrl(['pointmall/history', 'user_id' => $user_id,'language'=>$language,'imei' => $imei, 'access_token' => $access_token]) ?>"><?=Yii::t('translate', 'Exchange history'); ?></a></span>
                <?php } else { ?>
                    <span><a class="login"><?=Yii::t('translate', 'Exchange history'); ?></a></span>
                <?php } ?>
            </div>
            <div class="points">
                <div class="ico"></div>
<!--                <span><a class="earn"><?=Yii::t('translate', 'How to earn points'); ?></a></span>-->
                <span><a style="color: #333" href="<?= Yii::$app->urlManager->createUrl(['site/guidance','language'=>$language])?>"><?=Yii::t('translate', 'How to earn points'); ?></a></span>
            </div>
        </div>


        <div class="main-content row">
            <?php
            foreach ($integral_cate as $k => $v):
                $tempNum = Integral::getCatNumByCatId($k);
                if ($tempNum == 0) {
                    continue;
                }
                ?>
                <div class="main-content-list-item">
                <div class="title-bar row">
                    <div class="ico"><?= $v ?></div>
                    <span><?= $v ?>(<?= $tempNum; ?>)</span>
                </div>
                <div class="body row">
                    <ul>
                        <?php foreach (Integral::getIntegralByCatId($k) as $Integral): ?>
                        <li url="<?= Yii::$app->urlManager->createUrl(['pointmall/detail', 'id' => $Integral->id, 'user_id' => $user_id, 'imei' => $imei, 'access_token' => $access_token,'language'=>$language]) ?>">
                            <a href="<?= Yii::$app->urlManager->createUrl(['pointmall/detail', 'id' => $Integral->id, 'user_id' => $user_id, 'imei' => $imei, 'access_token' => $access_token,'language'=>$language]) ?>"><img class="goods-img" src="<?=$Integral->img_url?>"></a>
                            <div class="goods-info">
                                <p class="goods-title"><?= $Integral->getTitle($language); ?></p>
                                <p class="goods-desc">
                                    <?php
                                        if (mb_strlen($Integral->getContent($language)) > 45) {
                                            echo mb_substr($Integral->getContent($language), 0, 45) . ".....";
                                        } else {
                                            echo $Integral->getContent($language);
                                        }
                                    ?>
                                </p>
                                <div class="goods-points">
                                    <div class="ico"></div>
                                    <span class="val"><?= $Integral->discount ?></span>
                                </div>
                                        <?php if ($Integral->isSoldOut()) { ?>
                                            <div><a class="gray-btn <?php if(!$user){ echo 'login';}?>"><?= Yii::t('translate', 'Sold out'); ?></a></div>
                                        <?php } elseif (!$Integral->isValidGoods()) { ?>
                                            <div><a class="gray-btn <?php if(!$user){ echo 'login';}?>"><?= Yii::t('translate', 'Exchange'); ?></a></div>
                                        <?php } else { ?>
                                            <div><a class="btn exchange-btn <?php if(!$user){ echo 'login';}else{ echo 'exchange';}?>" count="<?= $Integral->discount ?>" giftId="<?= $Integral->id ?>" giftname="<?= $Integral->Title ?>"><?= Yii::t('translate', 'Exchange'); ?></a></div>
                                        <?php } ?>
                            </div>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                </div>
            <?php endforeach; ?>
        </div>

        
        
        <div class="alert confirmModal" style="display:none;">
            <div class="title"><?=Yii::t('translate', 'Exchange confirmation'); ?><div class="close"></div></div>
            <div class="body">
                 <div class="tips">
                     <?=Yii::t('translate',  'It will cost you <span class="spend_count"></span> Points to exchange for the <span class="spend_name"></span>, Are you sure?'); ?>
                </div>
                <div class="tipsbtn">
                    <div class="btn quit close"><?=Yii::t('translate', 'NO'); ?></div>
                    <div class="btn sure submitButton"><?=Yii::t('translate', 'Yes'); ?></div>
                </div>
            </div>
        </div>

        <div class="alert successModal" style="display:none;">
            <div class="title"><?=Yii::t('translate', 'Successfully Exchanged'); ?><div class="close"></div></div>
            <div class="body">
                 <div class="tips">
                     <?=Yii::t('translate','Congratulation on exchanging for the <span class="spend_name"></span> successfully.Check Exchange History for more information.'); ?>
                </div>
                <div class="checkbtn"><a style="color:#fff;" href="<?= Yii::$app->urlManager->createUrl(['pointmall/history', 'user_id' => $user_id, 'imei' => $imei, 'access_token' => $access_token,'language'=>$language]) ?>"><?=Yii::t('translate', 'Check it now'); ?></a></div>
            </div>
        </div>

        <div class="alert limitModal" style="display:none;">
            <div class="title"><?=Yii::t('translate', 'Exchange Failed'); ?><div class="close"></div></div>
            <div class="body">
                 <div class="tips">
                     <?=Yii::t('translate', 'You have exchanged for this item today. You can exchange for this item everyday for only once.'); ?>
                </div>
                <div class="checkbtn close"><?=Yii::t('translate', 'Yes'); ?></div>
            </div>
        </div>

        <div class="alert insufficientModal" style="display:none;">
            <div class="title"><?=Yii::t('translate', 'Insufficient Points'); ?><div class="close"></div></div>
            <div class="body">
                 <div class="tips">
                     <?=Yii::t('translate', "You don't have enough Points to exchange for this prize. Earn more points and come back later."); ?>
                </div>
                <div class="checkbtn"><a style="color:#fff;" href="<?= Yii::$app->urlManager->createUrl(['site/guidance']); ?>"><?=Yii::t('translate', "How to earn points"); ?></a></div>
            </div>
        </div>

        <div class="alert bindModal" style="display:none;">
            <div class="title"><?=Yii::t('translate', "Exchange Failed"); ?><div class="close"></div></div>
            <div class="body">
                 <div class="tips">
                     <?=Yii::t('translate', " You have to bind your phone number before exchange."); ?>
                </div>
                <div class="tipsbtn">
                    <div class="quit close"><?=Yii::t('translate', "Cancel"); ?></div>
                    <div class="sure bind"><?=Yii::t('translate', "Bind Now"); ?></div>
                </div>
            </div>
        </div>

        <!--遮罩层-->
        <div class="cover" style="display:none;"></div>

        
        <?php if ($user) { ?>
            <form>
                <input type="hidden" value="<?= $access_token ?>" name="access_token">
                <input type="hidden" value="<?= $user_id ?>" name="user_id">
                <input type="hidden" value="<?= $imei ?>" name="imei">
                <input type="hidden" value="" name="giftId">
                <input type="hidden" value="" name="giftname">
            </form>
        <?php } ?>
        <!-- scripts here -->
        <script src="js/jquery.min.js" type="text/javascript"></script>
        <link rel="stylesheet" href="css/swiper.min.css">
        <script src="js/swiper.js"></script>
        <script>new Swiper ('.swiper-container', {autoplay:3000});</script>
        <script>
            $(function(){
                    $('.login').on('click', function(e) {
                        e.stopPropagation();
                        window.intent.goToLogin();
                    }); 
                    $('.gray-btn').on('click',function(e){
                        e.stopPropagation();
                    });
                    $('.close').on('click',function(){ 
                        $(this).closest('.alert').hide();
                        $('.cover').hide();
                    });
                    $('.exchange').on('click', function(e) {
                       e.stopPropagation();
                       $('input[name="giftId"]').val($(this).attr('giftId'));
                       $('input[name="giftname"]').val($(this).attr('giftname'));
                       $('.confirmModal').find('.body').find('.spend_count').text($(this).attr('count'));
                       $('.confirmModal').find('.body').find('.spend_name').text($(this).attr('giftname'));
//                       $('.confirmModal').slideDown();\
                       $('.confirmModal').fadeIn();
                       $('.cover').show();
                   });
                   $('.submitButton').on('click', function() {
                        var user_id = $('input[name="user_id"]').val();
                        var access_token = $('input[name="access_token"]').val();
                        var imei = $('input[name="imei"]').val();
                        var giftId = $('input[name="giftId"]').val();
                        var url = "<?= Yii::$app->urlManager->createUrl('pointmall/exchange') ?>";
                        $.get(url, {user_id: user_id, access_token: access_token, imei: imei, giftId: giftId}, function(data) {
                            if (data.code === 0) {
                                $('.user-info').find('.point').text(data.reason);
                                $('.confirmModal').hide();
        //                        $('#successModal').find('.modal-body').text('Congratulation on exchanging for the '+ $('input[name="giftname"]').val()+' successfully.Check Exchange History for more information.');
                                $('.successModal').find('.body').find('.spend_name').text($('input[name="giftname"]').val());
                                $('.successModal').fadeIn();
                            } else if (data.code === 20002) {
                                //积分不足
                                $('.confirmModal').hide();
                                $('.insufficientModal').fadeIn();
                            } else if (data.code === 30009) {
                                //该账号在其他设备 重新登陆
                                $('.confirmModal').hide();
                                window.intent.chooseIntent(data.code);
                            } else if (data.code === 20003) {
                                //兑换的限制
                                $('.confirmModal').hide();
                                $('.limitModal').fadeIn();
                            } else if (data.code === 30008) {
                               
                               $('.confirmModal').hide();
                                window.intent.chooseIntent(data.code);
                            } else if ((data.code === 5002)) {
                                $('.confirmModal').hide();
                                $('.bindModal').fadeIn();
                            }else{
                                $('.confirmModal').hide();
                                $('.cover').hide();
                            }
                        },'json');
                    });
                    $('.pull-left').on('click', function() {
                        window.location.href = "backapp://back";
                    });
                    $('.bind').on('click', function() {
                        window.intent.bindPhone();
                    });
//                    $('.earn').on('click',function(){
//                        window.intent.chooseIntent(11);
//                    });
                    $('ul').find('li').on('click',function(){
                        window.location.href=$(this).attr('url');
                    })
            });
        </script>
    </body>
</html>