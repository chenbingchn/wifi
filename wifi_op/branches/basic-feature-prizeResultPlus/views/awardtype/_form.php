<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AwardType */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="award-type-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'award_type')->textInput() ?>

    <?= $form->field($model, 'award_type_en')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'award_type_id')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'award_type_zh')->textInput(['maxlength' => 50]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
