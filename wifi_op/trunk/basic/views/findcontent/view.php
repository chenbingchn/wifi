<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\Models\Findcontent */

$this->title = $model->product;
$this->params['breadcrumbs'][] = ['label' => 'Findcontents', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="findcontent-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'product',
            'show',
            'content',
            'app_img',
            'url',
        ],
    ]) ?>

    <p align="right">
        <?= Html::a('Back', ['findcontent/index'], ['class' => 'btn btn-primary']) ?>
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
