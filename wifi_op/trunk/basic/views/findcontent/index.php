<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\FindcontentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Findcontents';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="findcontent-index">

    <h1>发现页icon</h1>

        <p>
            <?=Html::a('Create Categorys', ['create'], ['class' => 'btn btn-success']);?>
        </p>

        <?=GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [

                'product',
                'productzh',
                'productyn',
                'show',
                'content',
                'contentzh',
                'contentyn',
                'app_img',
                'url',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]);?>

</div>
