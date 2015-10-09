<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\ActivitySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Activities';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="activity-index">

    <h1>消息中心</h1>

    <p>
        <?=Html::a('Create Activity', ['create'], ['class' => 'btn btn-success']);?>
    </p>
        <?=GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                'name',
                'namezh',
                'nameyn',
                'title',
                'titlezh',
                'titleyn',
                'content:ntext',
                'contentzh:ntext',
                'contentyn:ntext',
                'start_date',
                'end_date',
                'pic_url',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]);?>

</div>
