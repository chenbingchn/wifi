<?php

use yii\helpers\Html;
use app\models\Mainclass;

/* @var $this yii\web\View */
/* @var $model app\Models\Mainclass */

$this->title = 'Create Mainclass';
$this->params['breadcrumbs'][] = ['label' => 'Mainclasses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$pid=Mainclass::find()->max('pid');
$pid=$pid+1;
?>
<div class="mainclass-create">

    <h1>发现页大类别</h1>

    <?= $this->render('_form', [
        'model' => $model,
        'pid' => $pid,
    ]) ?>

</div>
