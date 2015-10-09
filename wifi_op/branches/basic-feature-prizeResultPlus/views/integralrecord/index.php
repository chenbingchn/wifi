<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\grid\CheckboxColumn;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\IntegralrecordSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Integralrecords';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="integralrecord-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <button type="button" class="btn btn-primary" style="float: right; margin-top: -40px;" onclick="GetCheckbox()">批量结算</button>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            ['label'=>'user_name','value' => 'account.user_name'],
            ['label'=>'phone_number','attribute' => 'phone_number','value' => 'account.phone_number'],
            'integral_id',
            'buy_date',
            'buy_time',
            ['label' => 'flag(1为已经结算0为还没有结算)','attribute' => 'flag','value' => 'flag'],


            ['class' => 'yii\grid\CheckboxColumn'],
        ],
    ]); ?>

</div>
<script src="js/updata.js"></script>
