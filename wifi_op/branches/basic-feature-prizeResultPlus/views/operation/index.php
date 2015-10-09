<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\OperationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Operations';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="operation-index">

    <h1>登录运营</h1>

        <p>
            <?=Html::a('Create Operation', ['create'], ['class' => 'btn btn-success']);?>
        </p>
        <?=GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                'type',
                'color_value',
                'title',
                'titlezh:ntext',
                'titleyn:ntext',
                'images',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]);?>

</div>
