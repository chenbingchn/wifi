<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Prize */

$this->title = $model->mobile;
$this->params['breadcrumbs'][] = ['label' => 'WiFi抽奖', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prize-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'mobile',
            [
                'label' => '中奖类型',
                'value' => $model->type==1?'1. Keuntungan Harian（好运每一天）':($model->type==2?'2. Hadiah Harian（天天送好礼）':'3. Hadiah Utama（劲爆超值大奖）') ,
            ],
        ],
    ]) 
    ?>
</div>
