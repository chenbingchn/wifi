<?php

use yii\widgets\ActiveForm;

$form = ActiveForm::begin(['method' => 'post',]);
echo $form->field($model, 'name')->textInput(['maxlength' => 20]);
echo $form->field($model, 'description')->textInput(['maxlength' => 20]);
?>
<div class="form-group pull-right">
    <?php if (Yii::$app->controller->action->id == 'updaterole'): ?>
        <input type="submit" value="编辑角色" class="btn btn-success">
    <?php else: ?>
        <input type="submit" value="创建角色" class="btn btn-success">
    <?php endif; ?>
</div>
<?php
ActiveForm::end();
