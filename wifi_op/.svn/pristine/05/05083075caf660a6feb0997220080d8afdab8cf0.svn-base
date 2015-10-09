<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\Models\Mainclass */

$this->title = $model->pid;
$this->params['breadcrumbs'][] = ['label' => 'Mainclasses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mainclass-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'pid',
            'Classname',
            'Classnamezh',
            'Classnameyn',
            'icon',
        ],
    ]) ?>

    <p align="right">
        <?= Html::a('Back', ['mainclass/index'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Update', ['update', 'id' => $model->pid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->pid], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>


</div>
