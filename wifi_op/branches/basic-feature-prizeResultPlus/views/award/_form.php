<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Award;
use app\models\AwardType;
/* @var $this yii\web\View */
/* @var $model app\models\Award */
/* @var $form yii\widgets\ActiveForm */
$row=AwardType::find()->all();
foreach ($row as $k => $v) {
    $type_code[$v['award_type']] = $v['award_type'];
    $type_en[$v['award_type']] = $v['award_type_en'];
    $type_id[$v['award_type']] = $v['award_type_id'];
    $type_zh[$v['award_type']] = $v['award_type_zh'];
}
?>

<div class="award-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'mobile')->textInput(['maxlength' => 11]) ?>

    <?= $form->field($model, 'award_type')->dropDownList($type_code,['prompt'=>'Select']) ?>

    <?= $form->field($model, 'award_type_en')->dropDownList($type_en,['prompt'=>'Select']) ?>

    <?= $form->field($model, 'award_type_id')->dropDownList($type_id,['prompt'=>'Select']) ?>

    <?= $form->field($model, 'award_type_zh')->dropDownList($type_zh,['prompt'=>'Select']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
