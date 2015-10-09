<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\Models\Activity */

$this->title = 'Create Activity';
$this->params['breadcrumbs'][] = ['label' => 'Activities', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
//从web端获取ID
$url = 'http://localhost:8888/api/snowflake';
$uid=file_get_contents($url);
preg_match('|<pre>(.*?)<\/pre>|i',$uid);
?>
<div class="activity-create">

    <h1>消息中心</h1>

    <?= $this->render('_form', [
        'model' => $model,
        'id' => $uid,
    ]) ?>

</div>
