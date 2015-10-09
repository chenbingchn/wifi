<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\PushSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pushes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="push-index">

    <h1>推送页面</h1>

        <p>
            <?=Html::a('Create Push', ['create'], ['class' => 'btn btn-success']);?>
        </p>
        <?=GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [

                'image',
                'url:url',
                'html_url',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]);?>
</div>
