<?php

use yii\helpers\Html;
use app\models\Operation;


/* @var $this yii\web\View */
/* @var $model app\Models\Operation */

$this->title = 'Create Operation';
$this->params['breadcrumbs'][] = ['label' => 'Operations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$id=Operation::find()->max('id');
$id=$id+1;
?>
<div class="operation-create">

    <h1>登录运营</h1>

    <?= $this->render('_form', [
        'model' => $model,
        'id' => $id,
    ]) ?>

</div>
