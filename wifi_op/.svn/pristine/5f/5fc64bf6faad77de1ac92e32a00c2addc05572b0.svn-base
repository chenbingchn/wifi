<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\IntegralSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Integrals';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="integral-index">

    <h1>积分商城</h1>

        <p>
            <?=Html::a('Create Integral', ['create'], ['class' => 'btn btn-success']);?>
        </p>
        <?=GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [

                'id',
                'user_name',
                'Integral_value',
                'total',
                'ration',
                'discount',
                'usage',
                'start_time',
                'end_time',
                'Title',
                'Titlezh',
                'Titleyn',
                'Content',
                'Contentzh:ntext',
                'Contentyn:ntext',
                'img_url',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]);?>

</div>
