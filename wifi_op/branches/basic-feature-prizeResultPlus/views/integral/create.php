<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\Models\Integral */

$this->title = 'Create Integral';
$this->params['breadcrumbs'][] = ['label' => 'Integrals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="integral-create">

    <h1>积分商城</h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
