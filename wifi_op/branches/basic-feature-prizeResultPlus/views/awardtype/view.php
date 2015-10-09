<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\AwardType */

$this->title = $model->award_type;
$this->params['breadcrumbs'][] = ['label' => 'Award Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="award-type-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->award_type], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->award_type], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'award_type',
            'award_type_en',
            'award_type_id',
            'award_type_zh',
        ],
    ]) ?>

</div>
