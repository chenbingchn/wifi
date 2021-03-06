<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use app\models\Account;
use kartik\date\DatePicker;
use app\models\ScoreRecord;
use app\models\Integralrecord;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\AccountSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', '用户信息');
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="account-index">

    <?=GridView::widget([
        'dataProvider'=>$dataProvider,
        'filterModel'=>$searchModel,
        'pjax'=>true,
        'striped'=>true,
        'hover'=>true,
        'panel'=>[
            'type'=> 'default',
            'heading'=> Html::a(Yii::t('app', '用户信息'),['index'],['class' => 'text-primary'])
        ],
        'toolbar' => [
            [
                'content'=>
                    Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['index'], [
                        'class' => 'btn btn-default',
                        'title' => Yii::t('app', '重置')
                    ]),
            ],
            '{toggleData}',
            '{export}',
        ],
        'columns' => [

            [
                'label' => Yii::t('app', '用户名'),
                'attribute'=> 'user_name',
                'value' => function($model){
                    $user_name = $model['user_name'];
                    if($user_name != ''){
                        return $user_name;
                    }else{
                        return $user_name='';
                    }
                },
                'width' => '150px',
            ],
            [
                'label' => Yii::t('app', '电话号码'),
                'attribute'=> 'phone_number',
                'value' => function($model){
                    $phone_number = $model['phone_number'];
                    if($phone_number != ''){
                        return $phone_number;
                    }else{
                        return $phone_number='';
                    }
                },
                'width' => '180px',
            ],
            [
                'label' => Yii::t('app', 'Imei'),
                'attribute'=> 'imei',
                'value' => function($model){
                    $imei = $model['imei'];
                    $homeUrl=Yii::$app->homeUrl;
                    return '<a href="'.$homeUrl.'?ImeiuserbasicinfoSearch[imei]='.$imei.'&ImeiuserbasicinfoSearch[country_name]=&ImeiuserbasicinfoSearch[channel_id]=&ImeiuserbasicinfoSearch[first_date]=&ImeiuserbasicinfoSearch[email]=&ImeiuserbasicinfoSearch[city_name]=&r=imeiuserbasicinfo/index" class="btn btn-info">'.$imei.'</a>';
                },
                'vAlign'=>'middle',
                'format'=>'raw',
            ],
            [
                'label' => Yii::t('app', '年龄'),
                'attribute'=> 'age',
                'value' => function($model){
                    $age = $model['age'];
                    if($age != ''){
                        return $age;
                    }else{
                        return $age='';
                    }
                },
                'width' => '100px',
            ],
            [
                'label' => Yii::t('app', '性别'),
                'attribute'=>'gender',
                'value' => function($date){
                    if($date['gender'] == 1){
                        return Html::encode('男');
                    }elseif($date['gender'] == -1){
                        return Html::encode('女');
                    }else{
                        return Html::encode($date['age']);
                    }
                },
                'filterType'=>GridView::FILTER_SELECT2,
                'filterWidgetOptions'=>[
                    'data' => $age,
                    'options' => ['placeholder' => '请选择'],
                    'pluginOptions' =>[
                        'allowClear' => true,
                        'width' => 100
                    ]
                ],
                'vAlign'=>'middle',
                'format'=>'raw',
            ],
            [
                'label' => Yii::t('app', '创建日期'),
                'attribute'=>'created_at',
                'value' => 'created_at',
                'filterType'=>GridView::FILTER_DATE,
                'filterWidgetOptions'=>[
                    'type' => DatePicker::TYPE_INPUT,
                    'pluginOptions' =>[
                        'format' => 'yyyy-mm-dd',
                        'allowClear' => true,
                        'width' => 300
                    ]
                ],
                'vAlign'=>'middle',
                'format'=>'raw',
                'width' => '300px',
            ],

            [
                'label' => Yii::t('app', '用户来源'),
                'attribute'=>'third_type',
                'value' => function($date){
                    $Source = $date['third_type'];
                    if($Source == 0){
                        return Html::encode('手机号注册');
                    }elseif($Source == 2){
                        return Html::encode('Facebook登录');
                    }else{
                        return Html::encode($date['third_type']);
                    }
                },
                'filterType'=>GridView::FILTER_SELECT2,
                'filterWidgetOptions'=>[
                    'data' => $login_type,
                    'options' => ['placeholder' => '请选择'],
                    'pluginOptions' =>[
                        'allowClear' => true,
                        'width' => 150
                    ]
                ],
                'vAlign'=>'middle',
                'format'=>'raw',
            ],

            [
                'label' => Yii::t('app', '总积分'),
                'value' => function($model){
                    $counter = $model->score['counter'];
                    if($counter != ''){
                        return $counter;
                    }else{
                        return $counter='';
                    }
                },
                'attribute'=>'counter',
                'width' => '150px',
            ],

            [
                'label' => Yii::t('app','总获取积分'),
                'value' => function($model){
                    $id = $model['user_id'];
                    $row = ScoreRecord::find()->select(['sum(`score`) as score'])->andFilterWhere(['=','user_id',$id])->one();
                    if($row['score'] != ''){
                        return $row['score'];
                    }else{
                        return '';
                    }
                },
                'width' => '50px',
            ],

            [
                'label' => Yii::t('app','总兑换积分'),
                'value' => function($model){
                    $id = $model['user_id'];
                    $str = Integralrecord::find()->select(['sum(`bargin_points`) as bargin_points'])->andFilterWhere(['=','user_id',$id])->one();
                    if($str['bargin_points'] != ''){
                        return $str['bargin_points'];
                    }else{
                        return '';
                    }
                },
                'width' => '50px',
            ],

            [
                'class'=>'kartik\grid\ExpandRowColumn',
                'width'=>'50px',
                'value'=>function($model, $key, $index, $column){
                    return GridView::ROW_COLLAPSED;
                },
                'disabled' => function($model, $key, $index, $column){
                    $id = $model['user_id'];
                    $master = Account::find()->select('imei')->andFilterWhere(['=','master_uid',$id])->all();
                    $num = count($master);
                    if($num != 0){
                        return false;
                    }else{
                        return true;
                    }
                },
                'detail'=>function ($model, $key, $index, $column) {
                    return Yii::$app->controller->renderPartial('detailed', ['model'=>$model]);
                },
                'header' => '子账号',
                'headerOptions'=>[
                    'style'=>'text-align:center; font-size: 14px; color:black'
                ],
                'allowBatchToggle' => false,
            ],



            [
                'class' => 'kartik\grid\ActionColumn',
                'header'=>'操作',
                'headerOptions'=>[
                    'style'=>'text-align:center'
                ],
                'options'=>[
                    'style'=>'width:100px;'
                ],
                'template' => '{history} {getScorehistory} {spendScorehistory}',
                'buttons' => [
                    'history' => function ($url, $model, $key) {
                        $url = Yii::$app->urlManager->createUrl(['account/history','id'=>$key]);
                        return Html::a('<span class="glyphicon glyphicon-hand-right"></span>', $url,['title'=>'分享Wifi记录']);
                    },
                    'getScorehistory' => function ($url, $model, $key) {
                        $url = Yii::$app->urlManager->createUrl(['account/getscorehistory','id'=>$key]);
                        return Html::a('<span class="glyphicon glyphicon-cloud-upload"></span>', $url,['title'=>'赚取积分记录']);
                    },
                    'spendScorehistory' => function ($url, $model, $key) {
                        $url = Yii::$app->urlManager->createUrl(['account/spendscorehistory','id'=>$key]);
                        return Html::a('<span class="glyphicon glyphicon-cloud-download"></span>', $url,['title'=>'兑换积分记录']);
                    },
                ]
            ],
        ],
    ]);
    ?>

</div>
