<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\EventsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Events';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="events-index">

    <h1>活动内容</h1>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [

                'activity_url:url',
                'flag',
                'created_at',

                ['class' => 'yii\grid\ActionColumn','template' => '{update}'],
            ],
        ]);?>

</div>
