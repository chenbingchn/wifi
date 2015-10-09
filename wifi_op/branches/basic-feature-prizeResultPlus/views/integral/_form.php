<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use app\models\IntegralCategory;

/* @var $this yii\web\View */
/* @var $model app\Models\Integral */
/* @var $form yii\widgets\ActiveForm */
$name=Yii::$app->user->identity->username;
?>

<div class="integral-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <?=$form->field($model, 'user_name')->hiddenInput(['value'=>$name])->hint($name)?>

    <?= $form->field($model, 'Integral_value')->textInput() ?>

    <?= $form->field($model, 'total')->textInput() ?>

    <?= $form->field($model, 'ration')->textInput() ?>

    <?= $form->field($model, 'discount')->textInput() ?>

    <?= $form->field($model, 'usage')->textInput() ?>
    
     <?= $form->field($model, 'cat_id')->dropDownList(IntegralCategory::getCatecory()) ?>

    <div class="time-pick-main">
        <h4>start_time</h4>
        <div class="time-pick-content">
        <?= DatePicker::widget([
            'model' => $model,
            'attribute' => 'start_time',
            'template' => '{addon}{input}',
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd',
                'language'=>'zh'
            ]
        ]);?>
        </div>
    </div>
    <div class="time-pick-main">
        <h4>end_time</h4>
        <div class="time-pick-content">
            <?= DatePicker::widget([
                'model' => $model,
                'attribute' => 'end_time',
                'template' => '{addon}{input}',
                'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd',
                    'language'=>'zh'
                ]
            ]);?>
        </div>
    </div>

    <?= $form->field($model, 'Title')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'Titlezh')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'Titleyn')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'Content')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'Contentzh')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Contentyn')->textarea(['rows' => 6]) ?>
    
     <?= $form->field($model, 'tips')->textarea(['rows' => 6]) ?>
    
     <?= $form->field($model, 'use')->textarea(['rows' => 6]) ?>
    
    <?= $form->field($model, 'tipsyn')->textarea(['rows' => 6]) ?>
    
     <?= $form->field($model, 'useyn')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'img_url')->fileInput(); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<script src="js/jquery.min.js"></script>
<script>
    $(function(){
       <?php if($model->img_url){?>
            $("input[name='Integral[img_url]']").eq(0).val('<?=$model->img_url?>'); 
            $("input[name='Integral[img_url]']").eq(1).parent().append('<?= substr($model->img_url,strrpos($model->img_url,'/')+1) ;?>');
       <?php }?>
       $('form').submit(function(){
           var input  =$("input[name='Integral[img_url]']").eq(0); 
           var fileInput  =$("input[name='Integral[img_url]']").eq(1);
           if(input.val()||fileInput.val()){
               return  true;
           }else{
//               console.log(input.find('.help-block'));
               input.parent().addClass('has-error').find('.help-block').text('请上传图片').show();
               return false;
           }
       })
    });
</script>
            
