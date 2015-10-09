<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Award;
use app\models\AwardType;
/* @var $this yii\web\View */
/* @var $model app\models\Award */
/* @var $form yii\widgets\ActiveForm */
$row=Award::find()->all();
foreach ($row as $k => $v) {
    $type_code[$v['award_type']] = $v['award_type'];
    $type_en[$v['award_type']] = $v['award_type_en'];
    $type_id[$v['award_type']] = $v['award_type_id'];
    $type_zh[$v['award_type']] = $v['award_type_zh'];
}

$dsn = 'mysql:host=localhost;dbname=wifi';
$db = new PDO($dsn, 'root', '');
$result = $db->query('select * from award');
?>

<script>
    function autoValue1() {
        var obj = document.getElementById("type_code");
        var index = obj.selectedIndex;
        var type_en;
        var type_id;
        var type_zh;
        switch(index) {

//
            case 1:
                type_en = "Daily Luck";
                type_id = "Keuntungan Harian";
                type_zh = "好运每一天";
                break;
            case 2:
                type_en = "Daily Prize";
                type_id = "Hadiah Harian";
                type_zh = "天天送好礼";
                break;
            case 3:
                type_en = "Amazing Gift";
                type_id = "Hadiah Utama";
                type_zh = "劲爆超值大奖";
                break;
        }
        document.getElementById("type_en").value=type_en;
        document.getElementById("type_id").value=type_id;
        document.getElementById("type_zh").value=type_zh;
    }
</script>

<div class="award-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'mobile')->textInput(['maxlength' => 11]) ?>



    <?= $form->field($model, 'award_type')->textInput(['maxlength' => 12, 'id'=>'type_code']) ?>
    <?= $form->field($model, 'award_type_en')->textInput(['maxlength' => 50, 'id'=>'type_en']) ?>
    <?= $form->field($model, 'award_type_id')->textInput(['maxlength' => 50, 'id'=>'type_id']) ?>
    <?= $form->field($model, 'award_type_zh')->textInput(['maxlength' => 50, 'id'=>'type_zh']) ?>

    <?= $form->field($model, 'award_type')->dropDownList($type_code,['prompt'=>'Select','onchange'=>'autoValue()',
        'id'=>'type_code']) ?>
    <?= $form->field($model, 'award_type_en')->dropDownList($type_en,['prompt'=>'Select','onchange'=>'autoValue()',
        'id'=>'type_en']) ?>

    <?= $form->field($model, 'award_type_id')->dropDownList($type_id,['prompt'=>'Select','onchange'=>'autoValue()',
        'id'=>'type_id']) ?>

    <?= $form->field($model, 'award_type_zh')->dropDownList($type_zh,['prompt'=>'Select','onchange'=>'autoValue()',
        'id'=>'type_zh']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
