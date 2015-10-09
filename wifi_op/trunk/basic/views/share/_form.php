<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\Models\Share */
/* @var $form yii\widgets\ActiveForm */
if($model->id != NULL){
    $ids=$model->id;
}else{
    $ids=$id;
}
if($ids <= 3){
    $hints="此时要选择关闭才能通过表单提交";
}
if($ids >3){
    $hints="此时控制页面是否将其显示在对应的页面中";
}
?>
<div class="share-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'id')->hiddenInput(['value' => $ids,'id' => 'my'])->hint($ids) ?>

    <?= $form->field($model, 'type')->textInput(['id'=>'lase','style'=> 'width:300px;','onfocus'=>"this.blur()"]) ?>

    <div id="states">
    <?= $form->field($model, 'state')->radioList(['0'=>'显示','1'=>'关闭'])->hint($hints)  ?>
    </div>

    <div id="cont">
    <?= $form->field($model, 'color_value')->textInput() ?>
    </div>

    <?= $form->field($model, 'title')->textInput() ?>

    <?= $form->field($model, 'titlezh')->textInput() ?>

    <?= $form->field($model, 'titleyn')->textInput() ?>

    <?= $form->field($model, 'max_value')->textInput(['style'=> 'width:300px;']) ?>

    <div id="value">
    <?= $form->field($model, 'min_value')->textInput(['style'=> 'width:300px;']) ?>
    </div>

    <div id="pic">
    <?= $form->field($model, 'icon')->fileInput() ?>
    </div>

    <?= $form->field($model, 'pic_url')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php
switch($ids){
    case 1:
        echo '<script>document.getElementById("lase").value="有key的Wifi";
                document.getElementById("value").style.display="none";
                document.getElementById("states").style.display="none";</script>';
        break;
    case 2:
        echo '<script>document.getElementById("lase").value="无key的wifi";
                document.getElementById("value").style.display="none";
                document.getElementById("states").style.display="none";</script>';
        break;
    case 3:
        echo '<script>document.getElementById("lase").value="密码框输入下标";
                document.getElementById("value").style.display="none";
                document.getElementById("states").style.display="none";</script>';
        break;
    case 4:
        echo '<script>document.getElementById("lase").value="积分兑换高亮";
                document.getElementById("value").style.display="none";</script>';
        break;
    case 5:
        echo '<script>document.getElementById("lase").value="积分商城高亮";
                document.getElementById("value").style.display="none";</script>';
        break;
    case 6:
        echo '<script>document.getElementById("lase").value="分享给我的朋友高亮";
                document.getElementById("value").style.display="none";</script>';
        break;
    case 7:
        echo '<script>document.getElementById("lase").value="我分享的wifi高亮";
                document.getElementById("value").style.display="none";</script>';
        break;
    case 8:
        echo '<script>document.getElementById("lase").value="活动页面高亮";
                document.getElementById("value").style.display="none";</script>';
        break;
    case 9:
        echo '<script>document.getElementById("lase").value="主页分享wifi按钮页面";
                document.getElementById("cont").style.display="none";
                document.getElementById("pic").style.display="none";
                document.getElementById("states").style.display="none";</script>';
        break;
    case 10:
        echo '<script>document.getElementById("lase").value="开机启动页可运营";
                document.getElementById("cont").style.display="none";
                document.getElementById("pic").style.display="none";
                document.getElementById("states").style.display="none";</script>';
        break;
    case 11:
        echo '<script>document.getElementById("lase").value="分享wifi页(未被分享)";
                document.getElementById("value").style.display="none";</script>';
        break;
    case 12:
        echo '<script>document.getElementById("lase").value="分享wifi页(自己分享)";
                document.getElementById("value").style.display="none";</script>';
        break;
    case 13:
        echo '<script>document.getElementById("lase").value="分享wifi页(被别人分享)";
                document.getElementById("value").style.display="none";</script>';
        break;
    case 14:
        echo '<script>document.getElementById("lase").value="未被分享(标题1)";
                document.getElementById("value").style.display="none";</script>';
        break;
    case 15:
        echo '<script>document.getElementById("lase").value="未被分享(标题2)";
                document.getElementById("value").style.display="none";</script>';
        break;
    case 16:
        echo '<script>document.getElementById("lase").value="自己分享(标题1)";
                document.getElementById("value").style.display="none";</script>';
        break;
    case 17:
        echo '<script>document.getElementById("lase").value="自己分享(标题2)";
                document.getElementById("value").style.display="none";</script>';
        break;
    case 18:
        echo '<script>document.getElementById("lase").value="被自己分享(标题1)";
                document.getElementById("value").style.display="none";</script>';
        break;
    case 19:
        echo '<script>document.getElementById("lase").value="被自己分享(标题2)";
                document.getElementById("value").style.display="none";</script>';
        break;

}
?>