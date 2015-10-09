<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\RaidersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->title = 'Raiders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="raiders-index">

    <h1>积分攻略</h1>

        <p>
            <?=Html::a('Create Raiders', ['create'], ['class' => 'btn btn-success']);?>
        </p>
        <?=GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [

                'title',
                'titlezh',
                'titleyn',
                'content:ntext',
                'contentzh:ntext',
                'contentyn:ntext',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]);?>

</div>
