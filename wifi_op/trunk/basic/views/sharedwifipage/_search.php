<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\SharedwifipageSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sharedwifipage-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'create_user') ?>

    <?= $form->field($model, 'type') ?>

    <?= $form->field($model, 'header_EN') ?>

    <?= $form->field($model, 'header_Ind') ?>

    <?=$form->field($model, 'title_EN') ?>

    <?=$form->field($model, 'title_Ind') ?>

    <?=$form->field($model, 'content_EN') ?>

    <?=$form->field($model, 'content_Ind') ?>

    <?=$form->field($model, 'pic_url') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
