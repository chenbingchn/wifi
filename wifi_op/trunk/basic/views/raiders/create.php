<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\Models\Raiders */

$this->title = 'Create Raiders';
$this->params['breadcrumbs'][] = ['label' => 'Raiders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="raiders-create">

    <h1>积分攻略</h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
