<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Prize */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="prize-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'mobile')->textInput(['maxlength' => 11,'style'=>'width:300px']) ?>

<!--     <?= $form->field($model, 'type')->textInput(['maxlength' => 1]) ?> -->

    <?php $str = array(1=>'1. Keuntungan Harian（好运每一天）',2=>'2. Hadiah Harian（天天送好礼）', 3=>'3. Hadiah Utama（劲爆超值大奖）'); ?>
    <?= $form->field($model, 'type')->dropDownList($str,['prompt'=>'请选择','style'=>'width:300px']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>


