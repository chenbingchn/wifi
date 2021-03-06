<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\AccountSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '用户信息';
$this->params['breadcrumbs'][] = $this->title;
if($searchModel->gender==1){
    $searchModel->gender='男';
}elseif($searchModel->gender==-1){
    $searchModel->gender='女';
}
$this->registerJs('$(function(){
        $("#export").click(function(){
            window.location = "index.php?r=account/export";
        });
    })'); 
?>
<div class="account-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="pull-right" style="margin-bottom:10px">
        <?= Html::a('Back', ['account/index'], ['class' => 'btn btn-primary']) ?>
        <button id="export" class="btn btn-info">导出</button>
    </div>
    <?=GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'label' => '<div style="width: 80px;">用户名</div>',
                'encodeLabel'=>false,
                'attribute' => 'user_name',
                'value' => 'user_name'
            ],
            [
                'label' => Yii::t('app', 'Email'),
                'attribute' => 'Email',
                'value' => function($model){
                    $email = $model->information['email'];
                    $row = str_replace('com.google=','google:',$email);
                    $row = str_replace('com.facebook.auth.login=','
                    facebook:',$row);
                    $row = str_replace('com.android.email=','
                    android:',$row);
                    $row = str_replace('&','
                    ',$row);
                    return $row;
                }
            ],
            'phone_number',
            'imei',
            [
                'label' => '<div style="width: 40px;">年龄</div>',
                'encodeLabel'=>false,
                'attribute' => 'age',
                'value' => 'age'
            ],
            [
                'label'=>'<div style="width: 40px;">性别</div>',
                'attribute'=>'gender',
                'encodeLabel'=>false,
                'value'=>function($model){
                      if($model->gender==1){
                          return '男';
                      }elseif($model->gender==-1){
                          return '女';
                      }
                }
            ],
            'product_model',

            [
                'label' => '<div style="width: 50px;">版本</div>',
                'encodeLabel'=>false,
                'attribute' => 'version',
                'value' => 'version'
            ],

            [
                'label'=>'<div style="width: 80px;">'.Yii::t('app', '国别').'</div>',
                'encodeLabel'=>false,
                'attribute' => 'country_name',
                'value' => 'information.country_name'
            ],

            [
                'label'=>Yii::t('app', '首次打开地点'),
                'attribute' => 'city_name',
                'value' => 'information.city_name'
            ],

            [
                'label'=>Yii::t('app', '首次打开时间'),
                'attribute' => 'first_date',
                'value' => 'information.first_date'
            ],

            'last_active_time',

            'created_at',

            [
                'label'=>'总积分',
                'attribute'=>'score.counter'
            ],
            ['class' => 'yii\grid\ActionColumn',
                'header'=>'操作',
                'headerOptions'=>[
                    'style'=>'text-align:center'
                ],
                'options'=>[
                    'style'=>'width:70px;'
                ],
                'template' => '{history} {getScorehistory} {spendScorehistory}',
                'buttons' => [
                    'history' => function ($url, $model, $key) {
                            $url = Yii::$app->urlManager->createUrl(['account/history','id'=>$key]);
                            return Html::a('<span class="glyphicon glyphicon-hand-right"></span>', $url,['title'=>'分享Wifi记录']);
                        },
                    'getScorehistory' => function ($url, $model, $key) {
                            $url = Yii::$app->urlManager->createUrl(['account/getscorehistory','id'=>$key]);
                            return Html::a('<span class="glyphicon glyphicon-cloud-upload"></span>', $url,['title'=>'获取积分记录']);
                        },
                    'spendScorehistory' => function ($url, $model, $key) {
                            $url = Yii::$app->urlManager->createUrl(['account/spendscorehistory','id'=>$key]);
                            return Html::a('<span class="glyphicon glyphicon-cloud-download"></span>', $url,['title'=>'花费积分记录']);
                        },
                ]
            ],
        ],
    ]);
    ?>


</div>
