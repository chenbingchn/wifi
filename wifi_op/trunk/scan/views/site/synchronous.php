<?php

use yii\grid\GridView;
use app\models\Account;

$this->title = 'synchronous';
$this->params['breadcrumbs'][] = $this->title;

$this->registerJsFile('@web/js/updata.js',['depends'=>[\app\assets\AppAsset::className()]]); 
?>
<div class="synchronous-index">

    <h1>同步Wifi</h1>

    <button type="button" class="btn btn-primary batchSync pull-right" style="margin-bottom: 10px;" >批量同步</button>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [

            ['label'=>'用户ID','value' => 'wifidata.user_id'],
            ['label'=>'用户名','value' =>function($model){
                     return Account::getUsernameByUserId($model->wifidata->user_id);
            }],
            'wifidata.orders.wifi_type',  
            'bssid',
            'ssid',
            'last_shared_at',
            'is_sync',
            ['class' => 'yii\grid\CheckboxColumn'],
        ],
    ]); ?>

</div>