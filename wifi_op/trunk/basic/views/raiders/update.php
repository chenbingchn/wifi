<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\Models\Raiders */

$this->title = 'Update Raiders: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Raiders', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="raiders-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
