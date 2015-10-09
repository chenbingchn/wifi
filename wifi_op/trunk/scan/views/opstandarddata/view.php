<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\Models\Opstandarddata */

$this->params['breadcrumbs'][] = ['label' => 'Opstandarddatas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="opstandarddata-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'user_id',
            'dataid',
            'auto_type',
            'type',
            'pay',
        ],
    ]) ?>

    <p align="right">
        <?= Html::a('Back', ['opstandarddata/index'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

</div>
