<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\Models\Integral */

$this->title = $model->Title;
$this->params['breadcrumbs'][] = ['label' => 'Integrals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="integral-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'user_name',
            'Integral_value',
            'total',
            'ration',
            'discount',
            'usage',
            'start_time',
            'end_time',
            'Title',
            'Titlezh',
            'Titleyn',
            'Content',
            'Contentzh:ntext',
            'Contentyn:ntext',
            'img_url:url',
        ],
    ]) ?>

    <p align="right">
        <?= Html::a('Back', ['integral/index'], ['class' => 'btn btn-primary']) ?>
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
