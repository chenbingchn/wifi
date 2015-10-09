<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\Models\Integral */

$this->title = 'Update Integral: ' . ' ' . $model->Title;
$this->params['breadcrumbs'][] = ['label' => 'Integrals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="integral-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
