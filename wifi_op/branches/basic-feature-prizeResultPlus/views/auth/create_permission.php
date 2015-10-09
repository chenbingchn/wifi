<?php

use yii\widgets\ActiveForm;

$form = ActiveForm::begin(['method' => 'post',]);
echo $form->field($model, 'name')->textInput();
echo $form->field($model, 'description')->textInput();
?>
<div class="form-group pull-right">
    <?php if (Yii::$app->controller->action->id == 'updatepermission'): ?>
        <input type="submit" value="编辑操作" class="btn btn-success">
    <?php else: ?>
        <input type="submit" value="创建操作" class="btn btn-success">
    <?php endif; ?>
</div>
<?php
ActiveForm::end();
