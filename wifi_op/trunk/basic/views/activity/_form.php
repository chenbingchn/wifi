<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\Models\Activity */
/* @var $form yii\widgets\ActiveForm */
if($model->id != NULL){
    $ids=$model->id;
}else{
    $ids=$id;
}
?>
<div class="activity-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'id')->hiddenInput(['value' => $ids])->hint($ids) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'namezh')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'nameyn')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'titlezh')->textInput(['maxlength' => 200]) ?>

    <?= $form->field($model, 'titleyn')->textInput(['maxlength' => 200]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'contentzh')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'contentyn')->textarea(['rows' => 6]) ?>

    <div class="time-pick-main">
        <h4>start_date</h4>
        <div class="time-pick-content">
            <?= DatePicker::widget([
                'model' => $model,
                'attribute' => 'start_date',
                'template' => '{addon}{input}',
                'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd',
                    'language'=>'zh'
                ]
            ]);?>
        </div>
    </div>
    <div class="time-pick-main">
        <h4>end_date</h4>
        <div class="time-pick-content">
            <?= DatePicker::widget([
                'model' => $model,
                'attribute' => 'end_date',
                'template' => '{addon}{input}',
                'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd',
                    'language'=>'zh'
                ]
            ]);?>
        </div>
    </div>

    <?= $form->field($model, 'pic_url')->fileInput(); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
