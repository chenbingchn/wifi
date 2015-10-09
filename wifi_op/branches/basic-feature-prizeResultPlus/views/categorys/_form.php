<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Mainclass;

/* @var $this yii\web\View */
/* @var $model app\Models\categorys */
/* @var $form yii\widgets\ActiveForm */
$str=array();
$row=Mainclass::find()->all();
foreach ($row as $k => $v) {
    $str[$v['pid']] = $v['Classname'];
}
if(count($str) == 0){
    echo '<script>alert("没有主类别不能新建分类")</script>';
    echo '<script>window.location.href="index.php?r=mainclass/index"</script>';
}
if($model->url != NULL){
    $url=$model->url;
}else{
    $url='http://';
}
?>
<script>
    function test() {
        var sel_obj = document.getElementById("my");

        var index = sel_obj.selectedIndex;

        document.getElementById("class").value=sel_obj.options[index].text;
    }
</script>

<div class="categorys-form">

    <?php $form = ActiveForm::begin(['id'=> 'pidform']); ?>

    <?= $form->field($model, 'pid')->dropDownList($str,['prompt'=>'请选择','style'=>'width:220px','onchange'=>'test()','id'=>'my']) ?>

    <?= $form->field($model, 'mainclass')->textInput(['id'=>'class','onfocus'=>"this.blur()",'style'=>'width:330px',]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => 20,'style'=>'width:330px']) ?>

    <?= $form->field($model, 'titlezh')->textInput(['maxlength' => 50,'style'=>'width:330px']) ?>

    <?= $form->field($model, 'titleyn')->textInput(['maxlength' => 50,'style'=>'width:330px']) ?>

    <?= $form->field($model, 'url')->Input('url',['style'=>'width:330px','value'=>$url]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
