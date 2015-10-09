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
                        case 0 : $row->type_name = '每人每日积分获取上限';
                            break;
                        case 1 : $row->type_name = '登录';
                            break;
                        case 2 : $row->type_name = '分享WiFi';
                            break;
                        case 3 : $row->type_name = '注册';
                            break;
                        case 4 : $row->type_name = 'wifi连接收入';
                            break;
                        case 5 : $row->type_name = '分享到社交网络';
                            break;
                        case 6 : $row->type_name = '上传头像';
                            break;
                        case 7 : $row->type_name = '完善资料';
                            break;
                        case 8 : $row->type_name = '未登录设备转入';
                            break;
                        case 9 : $row->type_name = '绑定Facebook';
                            break;
                        case 10 : $row->type_name = '绑定手机号';
                            break;
                        case 11 : $row->type_name = '常规签到';
                            break;
                        case 12 : $row->type_name = '连续三天签到';
                            break;
                        case 13 : $row->type_name = '连续7天签到';
                            break;
                        default : $row->type_name = '';
                    };
                    return $row->type_name;
                }
            ],
            ['label' => '每次获得积分配额','value' => 'score'],
            ['label' => '每日最高获取积分上限','value' => 'link.limits'],

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update}'
            ],
        ],
    ]); ?>


</div>
