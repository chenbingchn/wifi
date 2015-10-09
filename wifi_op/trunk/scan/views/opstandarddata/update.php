<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\Models\Opstandarddata */

$this->params['breadcrumbs'][] = ['label' => 'Opstandarddatas', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="opstandarddata-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
