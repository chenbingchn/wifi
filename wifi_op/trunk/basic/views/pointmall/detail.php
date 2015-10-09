<?php
Yii::$app->language =$language; 

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>积分兑换详情页</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=0">
<meta name="description" content="points mall">
<link rel="stylesheet" href="css/pointmall.css" type="text/css" media="screen" charset="utf-8"/>
<style>
    .body p{
        line-height: 1.5;
    }
</style>
</head>
<body>
<!-- content here -->
<div class="nav row">
    <div class="back pull-left"></div>
    <div class="title"><?= $Integral->getTitle($language); ?></div>
</div>

<div class="detail-image row">
    <a href=""><img class="row" src="<?= $Integral->img_url ?>"></a>
</div>

<div class="detail-title-bar">
    <div class="pull-left"><?= $Integral->getTitle($language); ?></div>
    <div class="pull-right">
        <div class="real-value"><span class="real-icon"></span><?= $Integral->discount ?> </div>
        <div class="origin-value"><span class="origin-icon"></span><?= $Integral->Integral_value ?></div>
    </div>
</div>

<div class="detail-validity">
    <span class="validity-title">Validity: </span><span class="validity-value"><?= $Integral->start_time ?> <?=Yii::t('translate', 'to'); ?> <?= $Integral->end_time ?></span>
</div>

<div class="detail-desc">
    <?= $Integral->getContent($language) ?>
</div>

<div class="detail-content">
<div class="detail-content-item">
    <div class="title-bar">
        <div class="ico"></div>
        <span><?=Yii::t('translate', 'How to exchange?'); ?></span>
    </div>
    <div class="body row">
        <?= $Integral->getUse($language); ?>
    </div>
</div>

<div class="detail-content-item">
    <div class="title-bar">
        <div class="ico"></div>
        <span><?=Yii::t('translate', 'Tips'); ?></span>
    </div>
    <div class="body row">
        <?= $Integral->getTips($language); ?>
    </div>
</div>
</div>

<?php if (!strpos(Yii::$app->request->getReferrer(), 'history')) { ?>
<div class="detail-footer row">
      <?php if ($Integral->isSoldOut()) { ?>
            <div class="btn exchange-after <?php if($user_id=='-1'){ echo 'login';}?>"><?= Yii::t('translate', 'Sold out'); ?></div>
      <?php } elseif (!$Integral->isValidGoods()) { ?>
            <div class="btn exchange-after <?php if($user_id=='-1'){ echo 'login';}?>"><?= Yii::t('translate', 'Exchange'); ?></div>
      <?php } else { ?>
           <div class="btn exchange-now <?php if($user_id=='-1'){ echo 'login';}else{ echo 'exchange';}?>" count="<?= $Integral->discount ?>" giftId="<?= $Integral->id ?>" giftname="<?= $Integral->Title ?>"><?= Yii::t('translate', 'Exchange'); ?></div>
      <?php } ?>
</div>
<?php }?>


<!-- scripts here -->
<!--<script type="text/javascript" src="http://libs.baidu.com/jquery/2.1.4/jquery.min.js" charset="utf-8"></script>-->

<form>
    <input type="hidden" value="<?= $access_token ?>" name="access_token">
    <input type="hidden" value="<?= $user_id ?>" name="user_id">
    <input type="hidden" value="<?= $imei ?>" name="imei">
    <input type="hidden" value="<?= $id ?>" name="giftId">
    <input type="hidden" value="<?= $Integral->getTitle($language); ?>" name="giftname">
</form>


<div class="alert confirmModal" style="display:none;">
            <div class="title"><?=Yii::t('translate', 'Exchange confirmation'); ?><div class="close"></div></div>
            <div class="body">
                 <div class="tips">
                     <?=Yii::t('translate',  'It will cost you <span class="spend_count"></span> Points to exchange for the <span class="spend_name"></span>, Are you sure?'); ?>
                </div>
                <div class="tipsbtn">
                    <div class="quit close"><?=Yii::t('translate', 'NO'); ?></div>
                    <div class="sure submitButton"><?=Yii::t('translate', 'Yes'); ?></div>
                </div>
            </div>
        </div>

        <div class="alert successModal" style="display:none;">
            <div class="title"><?=Yii::t('translate', 'Successfully Exchanged'); ?><div class="close"></div></div>
            <div class="body">
                 <div class="tips">
                     <?=Yii::t('translate','Congratulation on exchanging for the <span class="spend_name"></span> successfully.Check Exchange History for more information.'); ?>
                </div>
                <div class="checkbtn"><a style="color:#fff;" href="<?= Yii::$app->urlManager->createUrl(['pointmall/history', 'user_id' => $user_id, 'imei' => $imei, 'access_token' => $access_token]) ?>"><?=Yii::t('translate', 'Check it now'); ?></a></div>
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
        
        <script src="js/jquery.min.js" type="text/javascript"></script>
        <script>
            $(function(){
                    $('.login').on('click', function() {
                        window.intent.goToLogin();
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
                    $('.earn').on('click',function(){
                        window.intent.chooseIntent(11);
                    });
                    $('ul').find('li').on('click',function(){
                        window.location.href=$(this).attr('url');
                    })
            });
        </script>

</body>
</html>
