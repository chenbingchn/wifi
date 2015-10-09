<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\Models\ShareWifi */
/* @var $form yii\widgets\ActiveForm */
if($model->id != NULL){
    $ids=$model->id;
}else{
    $ids=$id;
}
?>

<div class="share-wifi-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'id')->hiddenInput(['value' => $ids])->hint($ids) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'titlezh')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'titleyn')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'max_value')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'min_value')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'pic_url')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
