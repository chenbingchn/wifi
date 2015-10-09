<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\RaidersSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="raiders-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'titlezh') ?>

    <?= $form->field($model, 'titleyn') ?>

    <?= $form->field($model, 'content') ?>

    <?php // echo $form->field($model, 'contentzh') ?>

    <?php // echo $form->field($model, 'contentyn') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
