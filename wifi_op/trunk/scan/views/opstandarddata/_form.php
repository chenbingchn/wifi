<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\Models\Opstandarddata */
/* @var $form yii\widgets\ActiveForm */
?>
<h2><?=Html::encode($model->user_id)?>的账单确认</h2>
<div class="opstandarddata-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->hiddenInput()->hint($model->user_id) ?>

    <?= $form->field($model, 'dataid')->hiddenInput()->hint($model->dataid) ?>

    <?= $form->field($model, 'history_id')->hiddenInput()->hint($model->history_id) ?>

    <?= $form->field($model, 'type')->hiddenInput()->hint($model->type)?>

    <?= $form->field($model, 'auto_type')->hiddenInput()->hint($model->auto_type) ?>

    <?= $form->field($model, 'pay')->radioList(['1'=>'结款','0'=>'未结款']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success btn-xs' : 'btn btn-primary btn-sm']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
