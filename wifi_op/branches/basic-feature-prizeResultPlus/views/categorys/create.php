<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\Models\categorys */

$this->title = 'Create Categorys';
$this->params['breadcrumbs'][] = ['label' => 'Categorys', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="categorys-create">

    <h1>发现页小类别</h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
