<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Sharedwifipage */
/* @var $form yii\widgets\ActiveForm */

$create_user = Yii::$app->user->identity->username;
?>

<div class="sharedwifipage-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'id')->textInput(['disabled' => 'disabled']) ?>

    <?= $form->field($model, 'create_user')->textInput(['readonly' => "readonly",'value' => $create_user],['maxlength' => 30]) ?>

    <?= $form->field($model, 'type')->dropDownList(['1' => '未被分享','2' => '被自己分享','3' => '被别人分享'],['disabled' => 'disabled']) ?>

    <?= $form->field($model, 'header_EN')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'header_Ind')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'title_EN')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'title_Ind')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'content_EN')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'content_Ind')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'pic_url')->fileInput()->hint('图片分辨率为150*150') ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
