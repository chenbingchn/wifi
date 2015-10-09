<?php

use yii\helpers\Html;
use app\models\ShareWifi;


/* @var $this yii\web\View */
/* @var $model app\Models\ShareWifi */

$this->title = 'Create Sharewifi';
$this->params['breadcrumbs'][] = ['label' => 'Sharewifis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$id=ShareWifi::find()->max('id');
$id=$id+1;
?>
<div class="share-wifi-create">

    <h1>分享wifi</h1>

    <?= $this->render('_form', [
        'model' => $model,
        'id' => $id,
    ]) ?>

</div>
