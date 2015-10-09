<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\ShareWifiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="share-wifi-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'titlezh') ?>

    <?= $form->field($model, 'titleyn') ?>

    <?= $form->field($model, 'max_value') ?>

    <?= $form->field($model, 'min_value') ?>

    <?=$form->field($model, 'pic_url') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
