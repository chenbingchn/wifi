<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Scoreconfig */

$this->title = 'Create Scoreconfig';
$this->params['breadcrumbs'][] = ['label' => 'Scoreconfigs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="scoreconfig-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model_config' => $model_config,
        'model_limits' => $model_limits,
    ]) ?>

</div>
