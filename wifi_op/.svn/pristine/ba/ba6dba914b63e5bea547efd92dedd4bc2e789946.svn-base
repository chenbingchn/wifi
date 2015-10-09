<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\AccountSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '积分流水';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="account-index">
    <?php $form = ActiveForm::begin(['method' => 'get']); ?>
    <div class="time-pick-main">
        <h4>开始时间</h4>
        <div class="time-pick-content">
            <?=
            DatePicker::widget([
                'model' => $model,
                'attribute' => 'start',
                'template' => '{addon}{input}',
                'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd',
                ]
            ]);
            ?>
        </div>
    </div>
    <div class="time-pick-main">
        <h4>结束时间</h4>
        <div class="time-pick-content">
            <?=
            DatePicker::widget([
                'model' => $model,
                'attribute' => 'end',
                'template' => '{addon}{input}',
                'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd',
                ]
            ]);
            ?>
        </div>
    </div>
    <?= Html::submitButton('提交', ['class' => 'btn btn-success', 'style' => 'float:right;']) ?>
    <?php ActiveForm::end(); ?>
    <h1><?= Html::encode($this->title) ?></h1>

    <?=GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'user_name',
            'email',
            'phone_number',
            'imei',
            'age',
            [
                'label'=>'性别',
                'value'=>function($model){
                    return $model->gender==1?'男':'女';
                }
            ],
            [
                'label'=>'总积分',
                'attribute'=> 'score.counter',
            ],
            [
                'label' => '赚取积分',
                'value' => function($model) {
            $start = isset($_GET['DataForm']['start']) ? $_GET['DataForm']['start'] : null;
            $end = isset($_GET['DataForm']['end']) ? $_GET['DataForm']['end'] : null;
            return $model->getEarnScoreByDate($start, $end);
        }
            ],
            [
                'label' => '兑换积分',
                'value' => function($model) {
            $start = isset($_GET['DataForm']['start']) ? $_GET['DataForm']['start'] : null;
            $end = isset($_GET['DataForm']['end']) ? $_GET['DataForm']['end'] : null;
            return $model->getSpendScoreByDate($start, $end);
        }
            ],
            ['class' => 'yii\grid\ActionColumn',
                'header' => '操作',
                'headerOptions' => [
                    'style' => 'text-align:center'
                ],
                'options' => [
                    'style' => 'width:70px;'
                ],
                'template' => '{history} {getScorehistory} {spendScorehistory}',
                'buttons' => [
                    'history' => function ($url, $model, $key) {
                $url = Yii::$app->urlManager->createUrl(['account/history', 'id' => $key]);
                return Html::a('<span class="glyphicon glyphicon-hand-right"></span>', $url);
            },
                    'getScorehistory' => function ($url, $model, $key) {
                $url = Yii::$app->urlManager->createUrl(['account/getscorehistory', 'id' => $key]);
                return Html::a('<span class="glyphicon glyphicon-cloud-upload"></span>', $url);
            },
                    'spendScorehistory' => function ($url, $model, $key) {
                $url = Yii::$app->urlManager->createUrl(['account/spendscorehistory', 'id' => $key]);
                return Html::a('<span class="glyphicon glyphicon-cloud-download"></span>', $url);
            },
                ]
            ],
        ],
    ]);
    ?>

</div>
