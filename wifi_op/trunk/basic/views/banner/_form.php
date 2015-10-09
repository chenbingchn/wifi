<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Carousel;

/* @var $this yii\web\View */
/* @var $model app\Models\Banner */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="banner-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'type')->radioList(['1'=>'首页banner图片','0'=>'首页app推送','2'=>'发现页banner图片','3'=>'积分商城']) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'subtitle')->textInput(['maxlength' => 200]) ?>

    <?= $form->field($model, 'state')->radioList(['1'=>'启用','0'=>'关闭']) ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'pic_url')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
