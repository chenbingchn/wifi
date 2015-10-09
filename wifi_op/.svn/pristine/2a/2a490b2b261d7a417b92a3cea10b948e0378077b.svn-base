<?php

use yii\helpers\Html;
use yii\grid\GridView;
use dosamigos\datepicker\DatePicker;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\AccountSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'FeedBack';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="account-index">
    <?php $form = ActiveForm::begin(['method' => 'get']); ?>
    <div class="row">
        <div class="col-md-6">
            <label>开始时间</label>
            <?=
            DatePicker::widget([
                'name' => 'start_time',
                'value' => isset($_GET['start_time']) ? $_GET['start_time'] : '',
                'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd',
                ]
            ]);
            ?>
        </div>
        <div class="col-md-6">
            <label>结束时间</label>
            <?=
            DatePicker::widget([
                'name' => 'end_time',
                'value' => isset($_GET['end_time']) ? $_GET['end_time'] : '',
                'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd',
                ]
            ]);
            ?>
        </div>
    </div>
    <div class="row" style="margin-top:20px;">
        <input type="submit" class="btn btn-success pull-right" value="查询">
    </div >
    <?php ActiveForm::end(); ?>
    <h1>feedback详情页</h1>



    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'imei',
            'content',
            'contact',
            'created_at',
        ],
    ]);
    ?>

</div>
