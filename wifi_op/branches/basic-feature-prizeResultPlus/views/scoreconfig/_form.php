<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\View;


/* @var $this yii\web\View */
/* @var $model app\models\Scoreconfig */
/* @var $form yii\widgets\ActiveForm */
switch($model_config->id){
    case 0 : $name = '每人每日积分获取上限';
        break;
    case 1 : $name = '登录';
        break;
    case 2 : $name = '分享WiFi';
        break;
    case 3 : $name = '注册';
        break;
    case 4 : $name = 'wifi连接收入';
        break;
    case 5 : $name = '分享到社交网络';
        break;
    case 6 : $name = '上传头像';
        break;
    case 7 : $name = '完善资料';
        break;
    case 8 : $name = '未登录设备转入';
        break;
}
?>
<div class="scoreconfig-form">

    <?php $form = ActiveForm::begin(); ?>

    <div style="display: none">
        <?= $form->field($model_config, 'id')->textInput(['maxlength' => 20,'disabled'=>'true']) ?>
    </div>

    <?= $form->field($model_config, 'type_name')->hiddenInput(['maxlength' => 30,'disabled'=>'true'])->hint($name) ?>

    <?= $form->field($model_config, 'score')->textInput()
    ?>

    <?= $form->field($model_limits, 'limits')->textInput(['id' => 'limits']) ?>


    <div id="sub" class="form-group" style="width: 50%">
        <?= Html::submitButton($model_config->isNewRecord ? 'Create' : 'Update', ['class' => $model_config->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php
if($model_config->id == 0){
    echo "<script>document.getElementById('scoreconfig-score').setAttribute('readonly',true);</script>";
}
if($model_config->id >= 6 && $model_config->id < 8){
    echo "<script>document.getElementById('limits').setAttribute('readonly',true);</script>";
}
$this->registerJsFile('@web/js/verification.js',['depends'=>[\app\assets\AppAsset::className()]]);
?>