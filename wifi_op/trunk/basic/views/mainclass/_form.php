<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\Models\Mainclass */
/* @var $form yii\widgets\ActiveForm */

if($model->pid != NULL){
    $pids=$model->pid;
}else{
    $pids=$pid;
}

?>

<div class="mainclass-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'pid')->hiddenInput(['value' => $pids])->hint($pids) ?>

    <?= $form->field($model, 'Classname')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'Classnamezh')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'Classnameyn')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'icon')->fileInput(); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
