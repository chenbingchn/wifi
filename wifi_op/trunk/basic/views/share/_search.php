<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\ShareSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="share-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'type') ?>

    <?= $form->field($model, 'color_value') ?>

    <?= $form->field($model, 'icon') ?>

    <?= $form->field($model, 'title') ?>

    <?php // echo $form->field($model, 'titlezh') ?>

    <?php // echo $form->field($model, 'titleyn') ?>

    <?php // echo $form->field($model, 'content') ?>

    <?php // echo $form->field($model, 'contentzh') ?>

    <?php // echo $form->field($model, 'contentyn') ?>

    <?php // echo $form->field($model, 'pic') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
