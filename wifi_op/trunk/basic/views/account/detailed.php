<?php
use app\models\Account;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\grid\GridView;

$dataProvider = new ActiveDataProvider([
    'pagination' => [
        'pageSize' => 10,
    ],
    'query' => Account::find()->andFilterWhere(['=','master_uid',$model['user_id']]),
]);

?>
<div style="width: 90%; margin-left: 5%; margin-top: 2%;" >
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            [
                'label' => Yii::t('app', '电话号码'),
                'value' => function($model){
                    $phone = $model['phone_number'];
                    if($phone != ''){
                        return Html::encode($phone);
                    }else{
                        return Html::encode('');
                    }
                },
            ],

            [
                'label' => Yii::t('app', '来源'),
                'value' => function($model){
                    $type = $model['third_type'];
                    switch($type){
                        case 0 :
                            return $pri = '电话登陆';
                            break;
                        case 2 :
                            return $pri = 'Facebook登陆';
                            break;
                        default : return $pri = '';
                    }
                },
            ],
            [
                'label' => Yii::t('app', 'Imei'),
                'value' => 'imei',
            ],
            [
                'label' => Yii::t('app', '创建日期'),
                'value' => 'created_at',
            ],
        ],
        'layout' => '{items}',
    ]); ?>
</div>