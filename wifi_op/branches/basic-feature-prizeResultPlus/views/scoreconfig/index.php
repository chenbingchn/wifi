<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\ScoreconfigSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Scoreconfigs';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="scoreconfig-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [

            ['label' => '获取积分的方式','value' => function($row){
                switch($row->id){
                    case 0 : return $row->type_name = '每人每日积分获取上限';
                        break;
                    case 1 : return $row->type_name = '登录';
                        break;
                    case 2 : return $row->type_name = '分享WiFi';
                        break;
                    case 3 : return $row->type_name = '注册';
                        break;
                    case 4 : return $row->type_name = 'wifi连接收入';
                        break;
                    case 5 : return $row->type_name = '分享到社交网络';
                        break;
                    case 6 : return $row->type_name = '上传头像';
                        break;
                    case 7 : return $row->type_name = '完善资料';
                        break;
                    case 8 : return $row->type_name = '未登录设备转入';
                        break;
                };
            }],
            ['label' => '每次获得积分配额','value' => 'score'],
            ['label' => '每日最高获取积分上限','value' => 'link.limits'],

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update}'
            ],
        ],
    ]); ?>


</div>
