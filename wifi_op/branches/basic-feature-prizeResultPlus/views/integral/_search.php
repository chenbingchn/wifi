<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\IntegralSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="integral-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'user_name') ?>

    <?= $form->field($model, 'Integral_value') ?>

    <?= $form->field($model, 'total') ?>

    <?= $form->field($model, 'ration') ?>

    <?php // echo $form->field($model, 'discount') ?>

    <?php // echo $form->field($model, 'usage') ?>

    <?php // echo $form->field($model, 'start_time') ?>

    <?php // echo $form->field($model, 'end_time') ?>

    <?php // echo $form->field($model, 'Title') ?>

    <?php // echo $form->field($model, 'Titlezh') ?>

    <?php // echo $form->field($model, 'Titleyn') ?>

    <?php // echo $form->field($model, 'Content') ?>

    <?php // echo $form->field($model, 'Contentzh') ?>

    <?php // echo $form->field($model, 'Contentyn') ?>

    <?php // echo $form->field($model, 'img_url') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
