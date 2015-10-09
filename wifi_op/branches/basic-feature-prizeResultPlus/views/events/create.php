<?php

use yii\helpers\Html;
use app\models\Events;


/* @var $this yii\web\View */
/* @var $model app\Models\Events */

$this->title = 'Create Events';
$this->params['breadcrumbs'][] = ['label' => 'Events', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$id=Events::find()->max('id');
$id=$id+1;
?>
<div class="events-create">

    <h1>活动</h1>

    <?= $this->render('_form', [
        'model' => $model,
        'id' => $id,
    ]) ?>

</div>
