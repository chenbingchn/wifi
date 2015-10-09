<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Account;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\AccountSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '用户获取积分信息';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="account-index">

    <h1><?= Html::encode($this->title) ?><?= Html::a('返回', ['index'], ['class' => 'btn btn-primary','style'=>'float:right']) ?></h1>

    <?=GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'label'=>'用户名',
                'value'=>function($model){
                        return Account::getUsernameByUserId($model->user_id);
                }
            ],
            [
               'label'=>'获取积分类型',
               'value'=>function($model){
                      $tmp =[
                          '1'=>'登陆','2'=>'wifi首付','3'=>'注册','4'=>'分享的wifi收入','5'=>'分享到社交网络','6'=>'上传用户头像','7'=>'完善用户资料','8'=>'未登录设备积分转移',
                      ];
                   if(isset($tmp[$model->type])){
                       $row = $tmp[$model->type];
                   }else{
                       $row = $model->type;
                   }
                      return $row;
               }
            ],
            'score',
            'created_at',
        ],
    ]);
    ?>

</div>
