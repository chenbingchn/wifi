<?php

use yii\widgets\ActiveForm;

$form = ActiveForm::begin();
?>
<?= $form->field($model, 'title')->textInput(); ?>
<?= $form->field($model, 'content')->textarea(); ?>
<?= $form->field($model, 'url')->textInput(); ?>
<?= $form->field($model, 'jump_page')->dropDownList([
    '1'=>'首页',
    '2'=>'Discover',
    '3'=>'Mine',
    '4'=>'Map',
    '5'=>'Points Mall',
    '6'=>'Earn Points',
    '7'=>'Setting',
    '0'=>'Webview',
]); ?>
<div class="row text-center">
    <input type="submit" class="btn btn-success text-center" value="提交">
</div>
<?php
ActiveForm::end(); 
?>

