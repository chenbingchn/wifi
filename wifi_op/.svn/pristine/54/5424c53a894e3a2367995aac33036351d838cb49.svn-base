<?php

use yii\grid\GridView;
use yii\grid\ActionColumn;
use yii\helpers\Html;
?>
<div class="container">
    <?=
    GridView::widget([
        'dataProvider' => $provider,
        'columns' => [
            'username',
            'email',
            [
                'class' => 'yii\grid\ActionColumn',
                'header'=>'操作',
                'template' => '{userassign}',
                'buttons' => [
                    'userassign' => function ($url, $model, $key) {
                    return Html::a('<span class="glyphicon glyphicon-cog" title="设置权限"></span>', $url);
                },
                ]
            ]
        ],
//    'buttons' => [
//    // 下面代码来自于 yii\grid\ActionColumn 简单修改了下
//    'user-view' => function ($url, $model, $key) {
//    return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url);
//    },
//    'user-update' => function ($url, $model, $key) {
//    return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url);
//    },
//    ],
    ]);
    ?>
</div>