<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Account;

/* @var $this yii\web\View */
/* @var $model app\Models\Account */
/* @var $form yii\widgets\ActiveForm */

$max_id=Account::find()->max('user_id');
?>

<div class="account-form">

    <?php $form = ActiveForm::begin(); ?>

    <div style="padding-bottom: 20px; padding-top: 20px;">
        <input type="hidden" name="num" id="num">
        随机用户创建个数：<input type="text" name="num" id="num">
    </div>

    <div class="form-group">
        <?= Html::submitButton('创建',['class' => 'btn btn-success', 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
