<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\Models\Raiders */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Raiders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="raiders-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'titlezh',
            'titleyn',
            'content:ntext',
            'contentzh:ntext',
            'contentyn:ntext',
        ],
    ]) ?>

    <p align="right">
        <?= Html::a('Back', ['raiders/index'], ['class' => 'btn btn-primary']) ?>
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
