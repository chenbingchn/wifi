<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Account;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\AccountSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Accounts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="account-index">
    <p>
        <?= Html::a('创建新用户', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'filterModel'=>$searchModel,
        'dataProvider' => $dataProvider,
        'columns' => [
            'user_id',
            'user_name',
            'created_at',
            'pwd',
            [
                'label'=>'采集的wifi',
                'value'=>function($model,$index){
                    return Html::tag('a','<i class="fa fa-wifi fa-lg"></i>',['href'=>Yii::$app->urlManager->createUrl(['/account/wifi','id'=>$index])]);
                },
                'format'=>'raw',    
            ],
            [
                'label'=>'支付的流水',
                'value'=>function($model,$index){
                    return Html::tag('a','<i class="fa fa-dollar fa-lg"></i>',['href'=>Yii::$app->urlManager->createUrl(['/account/payrecord','OpstandarddataSearch[user_id]'=>$index])]);
                },
                'format'=>'raw',
            ],
            ['class' => 'yii\grid\ActionColumn',
              'template'=>'{update}&nbsp;&nbsp;&nbsp;{delete}',   
             'header'=>'操作'   
            ],
        ],
    ]); ?>

</div>
