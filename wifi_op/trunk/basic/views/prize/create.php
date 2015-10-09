<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Prize */

$this->title = '添加中奖号码';

$this->params['breadcrumbs'][] = ['label' => 'WiFi抽奖', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prize-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
