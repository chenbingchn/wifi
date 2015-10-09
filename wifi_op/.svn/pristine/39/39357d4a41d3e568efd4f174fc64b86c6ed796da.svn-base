<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Award;
use app\models\AwardType;
/* @var $this yii\web\View */
/* @var $model app\models\Award */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="award-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'mobile')->textInput(['maxlength' => 11]) ?>
    <?= $form->field($model, 'award_type')->textInput(['maxlength' => 12, 'id'=>'type_code']) ?>
    <?= $form->field($model, 'award_type_en')->textInput(['maxlength' => 50, 'id'=>'type_en']) ?>
    <?= $form->field($model, 'award_type_id')->textInput(['maxlength' => 50, 'id'=>'type_id']) ?>
    <?= $form->field($model, 'award_type_zh')->textInput(['maxlength' => 50, 'id'=>'type_zh']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
