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

    <?=$form->field($model,'user_name')->textInput()?>

    <?=$form->field($model,'password')->textInput(['maxlength' => 8])?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>