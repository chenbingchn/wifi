<?php

use yii\helpers\Html;
use app\models\Share;


/* @var $this yii\web\View */
/* @var $model app\Models\Share */

$this->title = 'Create Share';
$this->params['breadcrumbs'][] = ['label' => 'Shares', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$id=Share::find()->max('id');
$id=$id+1;
?>
<div class="share-create">

    <h1>首页下标题</h1>

    <?= $this->render('_form', [
        'model' => $model,
        'id' => $id,
    ]) ?>

</div>
