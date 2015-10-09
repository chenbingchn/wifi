<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\BannerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Banners';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="banner-index">

    <h1>App banner设置</h1>
    <?php
        echo '<p>';
        echo Html::a('Create Banner', ['create'], ['class' => 'btn btn-success']);
        echo '</p>';
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [

                'type',
                'title',
                'subtitle',
                'state',
                'url:url',
                'pic_url:url',

                ['class' => 'yii\grid\ActionColumn','header' => 'Operation'],
            ],
        ]);
    ?>

</div>
