<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Account;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\AccountSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '用户兑换积分信息';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="account-index">

    <h1><?= Html::encode($this->title) ?><?= Html::a('返回', ['index'], ['class' => 'btn btn-primary','style'=>'float:right']) ?></h1>

    <?=GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'label' => '用户名',
                'value' => function($model) {
            return Account::getUsernameByUserId($model->user_id);
        }
            ],
            [
                'label' => '商品名称',
                'value' => function($model) {
            return app\models\Integral::geTitleById($model->integral_id);
        }
            ],
            'buy_date',
            'buy_time',
            'bargin_points',
            [
                'label' => '是否结算',
                'value' => function($model) {
            return $model->flag == 1 ? '是' : "否";
        }
            ]
        ],
    ]);
    ?>

</div>
