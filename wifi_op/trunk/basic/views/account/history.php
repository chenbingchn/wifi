<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\BssidImei;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\AccountSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Wifi分享';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="account-index">

    <h1><?= Html::encode($this->title) ?><?= Html::a('返回',['index'], ['class' => 'btn btn-primary','style'=>'float:right']) ?></h1>

    <?=GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'bssid',
            [
                'label'=>'Ssid',
                'value'=>function($model){
                      return $model->wifi['ssid'];
                }
            ],
            [
                'label'=>'分享时间',
                'attribute'=>'created_at',
            ],
            [
                'label'=>'连接数', 
                'value'=>function($model){
                    return BssidImei::getConnectNumByBssid($model->bssid);
                }
            ],
        ],
    ]);
    ?>

</div>
