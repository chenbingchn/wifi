<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Integralrecord;
use app\models\IntegralCategory;
use dosamigos\datepicker\DatePicker;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\IntegralSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Integrals';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="integral-index">

    <h1>积分商城</h1>

    <p>
        <?= Html::a('新增商品', ['create'], ['class' => 'btn btn-success']); ?>
    </p>
    <?php $form = ActiveForm::begin(['method' => 'get']); ?>
    <div class="row">
        <div class="col-md-4">
            <label>商品Id</label>
            <input  type="text" name="integral_id" class="form-control" value="<?php if(isset($_GET['integral_id']) && !empty($_GET['integral_id'])){ echo $_GET['integral_id'];}?>">
        </div>
        <div class="col-md-4">
            <label>商品名称</label>
            <input  type="text" name="integral_name" class="form-control" value="<?php if(isset($_GET['integral_name']) && !empty($_GET['integral_name'])){ echo $_GET['integral_name'];}?>">
        </div>
        <div class="col-md-4">
            <label>商品类别</label>
            <select name="integral_cate" class="form-control">
                <?php foreach (IntegralCategory::getCatecory() as $k => $v): ?>
                    <option value="<?= $k ?>" <?php if(isset($_GET['integral_cate']) && !empty($_GET['integral_cate']) && $_GET['integral_cate'] == $k){  echo "selected"; }?>> <?= $v ?> </option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="row" >
        <div class="col-md-4">
            <label>商品状态</label>
            <select name="integral_state" class="form-control">
                <option value="0"> 请选择 </option>
                <option value="1" <?php if(isset($_GET['integral_state']) && !empty($_GET['integral_state']) && $_GET['integral_state'] == 1){  echo "selected"; }?>> 已售罄 </option>
                <option value="2" <?php if(isset($_GET['integral_state']) && !empty($_GET['integral_state']) && $_GET['integral_state'] == 2){  echo "selected"; }?>> 已下架</option>
                <option value="3" <?php if(isset($_GET['integral_state']) && !empty($_GET['integral_state']) && $_GET['integral_state'] == 3){  echo "selected"; }?>> 可兑换</option>
            </select>
        </div>
        <div class="col-md-4">
            <label>开始时间</label>
            <?=
            DatePicker::widget([
                'name' => 'start_time',
                'value' => isset($_GET['start_time']) ? $_GET['start_time'] : "",
                'clientOptions' => [
                    'format' => 'yyyy-mm-dd',
                ]
            ]);
            ?>
        </div>
        <div class="col-md-4">
            <label>结束时间</label>
            <?=
            DatePicker::widget([
                'name' => 'end_time',
                'value' => isset($_GET['end_time']) ? $_GET['end_time'] : "",
                'clientOptions' => [
                    'format' => 'yyyy-mm-dd',
                ]
            ]);
            ?>
        </div>
    </div>

    <br/>
    <input type="submit" value="查询" class="btn btn-info pull-right">
    <br/>
    <?php ActiveForm::end(); ?>
    <br/>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            'Title',
            'Integral_value',
            'discount',
            'total',
            'ration',
            'usage',
            [
                'label' => '全部兑换量',
                'value' => function($model) {
            return Integralrecord::getExchangCountByIntegralId($model->id);
        },
            ],
            [
                'label' => '商品有效期',
                'value' => function($model) {
            return $model->start_time . '<br/>' . $model->end_time;
        },
                'format' => 'raw'
            ],
            [
                'label' => '商品状态',
                'value' => function($model) {
            return $model->getState();
        },
                'format' => 'raw'
            ],
            [
                'label' => '商品分类',
                'value' => function($model) {
            return IntegralCategory::getCatNameById($model->cat_id);
        }
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>

</div>
