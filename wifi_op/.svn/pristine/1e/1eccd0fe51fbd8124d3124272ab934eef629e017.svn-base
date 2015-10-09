<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\Models\Operation */
/* @var $form yii\widgets\ActiveForm */
if($model->id != NULL){
    $ids=$model->id;
}else{
    $ids=$id;
}
?>
<script>
    function test() {
        var sel_obj = document.getElementById("choice");
        var index = sel_obj.selectedIndex;
        var a=sel_obj.options[index].value;
        if(a==1){
            document.getElementById("value").style.display="";
            document.getElementById("title").style.display="";
            document.getElementById("images").style.display="none";
        }
        if(a==2){
            document.getElementById("value").style.display="none";
            document.getElementById("title").style.display="";
            document.getElementById("images").style.display="none";
        }
        if(a==3){
            document.getElementById("value").style.display="none";
            document.getElementById("title").style.display="none";
            document.getElementById("images").style.display="";
        }

    }
</script>
<div class="operation-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'id')->hiddenInput(['value' => $ids])->hint($ids) ?>

    <?= $form->field($model, 'type')->dropDownList(['1'=>'带底色的文字','2'=>'纯文字','3'=>'图片'],['style'=>'width:220px','onchange'=>'test()','id'=>'choice']) ?>

    <div id="value">
    <?= $form->field($model, 'color_value')->textInput() ?>
    </div>
    <div id="title">
    <?= $form->field($model, 'title')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'titlezh')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'titleyn')->textarea(['rows' => 6]) ?>
    </div>
    <div id="images" style="display: none">
    <?= $form->field($model, 'images')->fileInput() ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
