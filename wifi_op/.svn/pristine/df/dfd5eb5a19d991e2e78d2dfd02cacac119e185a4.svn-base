<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\Models\ShareWifi */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Sharewifis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="share-wifi-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'titlezh:ntext',
            'titleyn:ntext',
            'max_value',
            'min_value',
            'pic_url:url',
        ],
    ]) ?>

    <p align="right">
        <?= Html::a('Back', ['sharewifi/index'], ['class' => 'btn btn-primary']) ?>
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
