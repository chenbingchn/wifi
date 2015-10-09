<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\MainclassSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mainclasses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mainclass-index">

    <h1>发现页大类别</h1>

        <p>
            <?=Html::a('Create Mainclass', ['create'], ['class' => 'btn btn-success']);?>
        </p>

        <?=GridView::widget([
                'dataProvider' => $dataProvider,

                'columns' => [

                    'Classname',
                    'Classnamezh',
                    'Classnameyn',
                    'icon',

                    ['class' => 'yii\grid\ActionColumn'],
                ],
        ]);?>
</div>
