<?php
    use yii\helpers\Html;
?>

<div class="container">
    <div class="row">
        <h2>Hello ,<?= Yii::$app->user->identity->username; ?></h2>
    </div>

    <div class="row" style="margin-top: 20px;">
        <div class="col-md-10 col-md-offset-1"><strong class="text-warning">今天的待办事项如下:</strong></div>
    </div>

    <div class="row" style="margin-top: 10px;">
        <div class="col-md-8 col-md-offset-1" style="border:1px solid #999; min-height: 300px;border-radius: 20px;background-color:#DDD">
            <div class="row" style="margin-top: 15px;">
                <div class="col-md-7 text-center"><h3><?= Html::tag('a','待审核wifi',['href'=>Yii::$app->urlManager->createUrl('data/index')])?></h3></div>
                <div class="col-md-5 text-center"><div style="background-color:#c9302c;width:50px;height:50px;border-radius:50px;color:white;padding-top:13px;padding-left:0px;font-size:16px;"><?= $PendingAuditNum?></div></div>
            </div>
            <div class="row" style="margin-top: 15px;">
                <div class="col-md-7 text-center"><h3><?= Html::tag('a','审核通过但失效wifi',['href'=>Yii::$app->urlManager->createUrl('data/index')])?></h3></div>
                <div class="col-md-5 text-center"><div style="background-color:#c9302c;width:50px;height:50px;border-radius:50px;color:white;padding-top:13px;padding-left:0px;font-size:16px;"><?= $PassButFailWifiNum?></div></div>
            </div>
            <div class="row" style="margin-top: 15px;">
                <div class="col-md-7 text-center"><h3><?= Html::tag('a','待结算wifi',['href'=>Yii::$app->urlManager->createUrl('opstandarddata/index')])?></h3></div>
                <div class="col-md-5 text-center"><div style="background-color:#c9302c;width:50px;height:50px;border-radius:50px;color:white;padding-top:13px;padding-left:0px;font-size:16px;"><?= $PendingSettlementNum?></div></div>
            </div>
            <div class="row" style="margin-top: 15px;">
                <div class="col-md-7 text-center"><h3><?= Html::tag('a','待同步wifi',['href'=>Yii::$app->urlManager->createUrl('site/synchronous')])?></h3></div>
                <div class="col-md-5 text-center"><div style="background-color:#c9302c;width:50px;height:50px;border-radius:50px;color:white;padding-top:13px;padding-left:0px;font-size:16px;"><?= $PendingSyncNum?></div></div>
            </div>
        </div>
    </div>
</div>
