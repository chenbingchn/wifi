<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\Models\Findcontent */
/* @var $form yii\widgets\ActiveForm */

if($model->url != NULL){
    $url=$model->url;
}else{
    $url='http://';
}
?>
<script type="text/javascript">
    function upperCase()
    {
        var x=document.getElementById("fname").value;
        document.getElementById("cont").value=x;
        var x=document.getElementById("fnamezh").value;
        document.getElementById("contzh").value=x;
        var x=document.getElementById("fnameyn").value;
        document.getElementById("contyn").value=x;
    }
</script>
<div class="findcontent-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'product')->textInput(['maxlength' => 20,'onblur'=>"upperCase()",'id'=>'fname']) ?>

    <?= $form->field($model, 'productzh')->textInput(['maxlength' => 50,'onblur'=>"upperCase()",'id'=>'fnamezh']) ?>

    <?= $form->field($model, 'productyn')->textInput(['maxlength' => 50,'onblur'=>"upperCase()",'id'=>'fnameyn']) ?>

    <?= $form->field($model, 'show')->radioList(['1'=>'推送','0'=>'不推送'])->hint('如果不选择则自动为不推送') ?>

    <?= $form->field($model, 'content')->textInput(['maxlength' => 150,'id'=>'cont'])->hint('如果如果不填写默认为产品名称')?>

    <?= $form->field($model, 'contentzh')->textInput(['maxlength' => 150,'id'=>'contzh'])->hint('如果如果不填写默认为产品名称')?>

    <?= $form->field($model, 'contentyn')->textInput(['maxlength' => 150,'id'=>'contyn'])->hint('如果如果不填写默认为产品名称')?>

    <?= $form->field($model, 'url')->Input('url',['value'=>$url]) ?>

    <?= $form->field($model, 'app_img')->fileInput(); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
