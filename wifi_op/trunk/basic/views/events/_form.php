<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\Models\Events */
/* @var $form yii\widgets\ActiveForm */
if($model->id != NULL){
    $ids=$model->id;
}else{
    $ids=$id;
}
?>

<div class="events-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->hiddenInput(['value' => $ids])->hint($ids) ?>

    <?= $form->field($model, 'activity_url')->textInput(['maxlength' => 128]) ?>

    <?= $form->field($model, 'flag')->radioList(['1'=>'无效','0'=>'有效']) ?>

    <div class="time-pick-main">
        <h4>created at</h4>
        <div class="time-pick-content">
            <?= DatePicker::widget([
                'model' => $model,
                'attribute' => 'created_at',
                'template' => '{addon}{input}',
                'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd',
                ]
            ]);?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
