<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PrizeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'WiFi抽奖';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prize-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('添加中奖号码', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'type',

            [
                'format' =>'raw',
                'label' => 'WiFi中奖类型',
                'value' => function($m) {
                    switch ($m->type) {
                        case 1:
                            return '1. Keuntungan Harian（好运每一天）';
                            break;
                        case 2:
                            return '2. Hadiah Harian（天天送好礼）';
                            break;                       
                        default:
                            return '3. Hadiah Utama（劲爆超值大奖）';              
                            break;
                    }
                }
            ],

            
            'mobile',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
