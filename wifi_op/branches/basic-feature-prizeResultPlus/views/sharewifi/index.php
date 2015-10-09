<?php

use yii\helpers\Html;
use yii\grid\GridView;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\ShareWifiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sharewifis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="share-wifi-index">

    <h1>分享wifi</h1>

    <p>
        <?= Html::a('Create Share Wifi', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [

            'id',
            'title',
            'titlezh:ntext',
            'titleyn:ntext',
            'max_value',
            'min_value',
            'pic_url:url',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
