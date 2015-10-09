<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\CategorysSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categorys';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categorys-index">

    <h1>发现页小类别</h1>

        <p>
            <?=Html::a('Create Categorys', ['create'], ['class' => 'btn btn-success']);?>
        </p>

        <?=GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [

                'mainclass',
                'title',
                'titlezh',
                'titleyn',
                'url:url',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]);?>

</div>
