<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AwardType */

$this->title = 'Update Award Type: ' . ' ' . $model->award_type;
$this->params['breadcrumbs'][] = ['label' => 'Award Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->award_type, 'url' => ['view', 'id' => $model->award_type]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="award-type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
