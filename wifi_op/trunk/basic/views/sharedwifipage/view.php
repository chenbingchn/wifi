<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Sharedwifipage */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '首页分享WiFi页'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sharedwifipage-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'create_user',
            'type',
            'header_EN',
            'header_Ind',
            'title_EN',
            'title_Ind',
            'content_EN',
            'content_Ind',
            'pic_url:url',
        ],
    ]) ?>

    <p align="right">
        <?= Html::a(Yii::t('app', 'Back'), ['sharedwifipage/index'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

</div>
