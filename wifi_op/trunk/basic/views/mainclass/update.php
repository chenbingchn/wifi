<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\Models\Mainclass */

$this->title = 'Update Mainclass: ' . ' ' . $model->pid;
$this->params['breadcrumbs'][] = ['label' => 'Mainclasses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->pid, 'url' => ['view', 'id' => $model->pid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mainclass-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
