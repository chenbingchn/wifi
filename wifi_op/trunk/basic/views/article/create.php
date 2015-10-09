<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\Models\Article */

$this->title = 'Create Article';
$this->params['breadcrumbs'][] = ['label' => 'Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-create">

    <h1>赚积分</h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
