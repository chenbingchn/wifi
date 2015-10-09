<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\IntegralCategory */

$this->title = 'Update Integral Category: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Integral Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="integral-category-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
