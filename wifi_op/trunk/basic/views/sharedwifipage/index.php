<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\SharedwifipageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', '首页分享WiFi页');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sharedwifipage-index">

    <h2><?= Html::encode($this->title) ?></h2>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'columns' => [

            'id',
            'create_user',
            [
                'label' => Yii::t('app', 'WiFi状态'),
                'value' =>function($date){
                    switch($date['type']){
                        case 1 : $str="未被分享";
                            break;
                        case 2 : $str="被自己分享";
                            break;
                        case 3 : $str="被别人分享";
                            break;
                        default : $str = '';
                    }
                    return Html::encode($str);
                },
            ],
            'header_EN',
            'header_Ind',
            'title_EN',
            'title_Ind',
            'content_EN',
            'content_Ind',
            [
                'label'=>Yii::t('app', '图标'),
                'format'=>'raw',
                'value' => function($data){
                    $url = $data['pic_url'];
                    if($url == ''){
                        return Html::encode('');
                    }else{
                        return Html::img($url, ['style' => 'width:80px']);
                    }
                }
            ],

            ['class' => 'yii\grid\ActionColumn','header' => '操作','template' => '{update}'],
        ],
    ]); ?>

</div>
