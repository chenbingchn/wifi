<?php
use kartik\grid\GridView;
use yii\helpers\Html;
use app\models\Account;


?>
<div class="event-index" style="">
    <?=GridView::widget([
        'dataProvider'=>$dataProvider,
        'filterModel' => $searchModel,
        'condensed'=> true,
        'pjax'=>true,
        'hover' => true,
        'panel'=>[
            'type'=> 'default',
            'heading'=> Html::a(Yii::t('app', '每日详情'),['wifitype'],['class' => 'text-primary'])
        ],
        'toolbar' => [
            '{toggleData}',
            '{export}',
            [
                'content'=>
                Html::a('后退',['wifistatistics/detailed','bssid' => $bssid],['class' => 'btn btn btn-primary']),
            ],
            [
                'content'=>
                    Html::a('重置',['wifistatistics/event','bssid' => $bssid,'time' => $time],['class' => 'btn btn-info']),
            ],
        ],
        'columns' => [
            [
                'label' => Yii::t('app', '物理地址'),
                'value' => 'bssid',
            ],
            [
                'label' => Yii::t('app', '连接时间'),
                'attribute' => 'connect_date',
                'value' => 'connect_date',
                'width'=>'160px',
            ],
            [
                'label' => Yii::t('app', '连接强度'),
                'encodeLabel'=>false,
                'attribute' => 'level',
                'width'=>'36px',
                'value' => function($date){
                    $str = str_replace('-','',$date['level']);
                    return "<img src='images/wifi.png'><code>" . Html::encode($str.'%') . '</code>';
                },
                'vAlign'=>'middle',
                'format'=>'raw',
            ],

            [
                'attribute'=>'connect_way',
                'value'=> function($date){
                    switch($date['connect_way']){
                        case 201 : $str="点击连接不需要输密码（不包含本地保存）";
                            break;
                        case 202 : $str="手动输入需要密码wifi";
                            break;
                        case 203 : $str="自动连接";
                            break;
                        case 204 : $str="本地保存";
                            break;
                        default : $str = '未知连接状态';
                    }
                    return Html::encode($str);
                },
                'filterType'=> GridView::FILTER_SELECT2,
                'filterWidgetOptions'=>[
                    'data' => $date_way,
                    'options' => ['placeholder' => '请选择'],
                    'pluginOptions' =>[
                        'allowClear' => true,
                        'width' => 200
                    ]
                ],
                'vAlign'=>'middle',
                'format'=>'raw',
            ],

            [
                'label' => '<b>连接人手机号<small style="color: #cccccc; font-size: 10px;">(不支持排序筛选)</small></b>',
                'encodeLabel'=>false,
                'value' => function($date){
                    $name = Account::find()->select(['phone_number'])->andFilterWhere(['=','user_id',$date['connector_uid']])->one();
                    return Html::encode($name['phone_number']);
                },
                'width'=>'100px',
            ],

            [
                'label' => Yii::t('app', '连接IMEI'),
                'attribute' => 'connector_imei',
                'value' => 'connector_imei',
                'width'=>'160px',
            ],

            [
                'label' => Yii::t('app', '连接状态'),
                'encodeLabel'=>false,
                'attribute' => 'connect_event',
                'value' => function($date){
                    switch($date['connect_event']){
                        case 101 : $str="点击连接";
                            break;
                        case 102 : $str="连接失败";
                            break;
                        case 103 : $str="连接成功";
                            break;
                        case 104 : $str="连上无网络";
                            break;
                        case 105 : $str="密码错误";
                            break;
                        default : $str = '错误未知';
                    }
                    return Html::encode($str);
                },
                'filterType'=> GridView::FILTER_SELECT2,
                'filterWidgetOptions'=>[
                    'data' => $date_event,
                    'options' => ['placeholder' => '请选择'],
                    'pluginOptions' =>[
                        'allowClear' => true,
                        'width' => 100
                    ]
                ],
                'vAlign'=>'middle',
                'format'=>'raw',
            ],
        ]
    ])?>
</div>