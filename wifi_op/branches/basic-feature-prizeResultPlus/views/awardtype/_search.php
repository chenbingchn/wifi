<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\AwardtypeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="award-type-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'award_type') ?>

    <?= $form->field($model, 'award_type_en') ?>

    <?= $form->field($model, 'award_type_id') ?>

    <?= $form->field($model, 'award_type_zh') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
