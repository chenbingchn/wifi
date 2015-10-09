<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\Models\Opstandarddata */

$this->title = 'Create Opstandarddata';
$this->params['breadcrumbs'][] = ['label' => 'Opstandarddatas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="opstandarddata-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
