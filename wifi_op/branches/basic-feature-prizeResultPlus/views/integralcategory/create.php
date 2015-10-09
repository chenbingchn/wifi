<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\IntegralCategory */

$this->title = 'Create Integral Category';
$this->params['breadcrumbs'][] = ['label' => 'Integral Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="integral-category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
