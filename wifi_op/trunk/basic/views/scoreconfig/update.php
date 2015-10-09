<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Scoreconfig */

$this->title = 'Update Scoreconfig: ' . ' ' . $model_config->id;
$this->params['breadcrumbs'][] = ['label' => 'Scoreconfigs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model_config->id, 'url' => ['view', 'id' => $model_config->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="scoreconfig-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model_config' => $model_config,
        'model_limits' => $model_limits,
    ]) ?>

</div>