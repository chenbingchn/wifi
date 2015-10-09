<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\AwardType */

$this->title = 'Create Award Type';
$this->params['breadcrumbs'][] = ['label' => 'Award Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="award-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
