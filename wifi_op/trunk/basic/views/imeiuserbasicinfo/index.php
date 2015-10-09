<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\ImeiuserbasicinfoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', '用户设备数据');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="imeiuserbasicinfo-index">

    <h1><?= Html::encode($this->title) ?><?= Html::a('返回', ['account/index'], ['class' => 'btn btn-primary','style'=>'float:right']) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'imei',
            'country_name',
            'channel_id',
            'first_date',
            [
                'label' => Yii::t('app', 'Email'),
                'attribute'=>'email',
                'value' => function($data){
                    $nb = "<br>";
                    $email = $data['email'];
                    $row = str_replace('com.google=','google-->',$email);
                    $row = str_replace('com.facebook.auth.login=','facebook-->',$row);
                    $row = str_replace('com.android.email=','android-->',$row);
                    $row = str_replace('com.forshared=','forshared-->',$row);
                    $row = str_replace('&',$nb,$row);
                    return $row;
                },
                'format'=>'raw',
            ],
            'city_name',
        ],
    ]); ?>

</div>
