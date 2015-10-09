<?php
use kartik\grid\GridView;
use yii\helpers\Html;

$gets = Yii::$app->request->get('sort');
$urlt = Yii::$app->request->getAbsoluteUrl();
$rows = stripos($urlt, '&sort=');
if($rows == ''){
    $urlt = $urlt.'&sort=';
}else{
    $urlt = substr($urlt,0,$rows);
}
if($gets == null) {
    $gets = 'bssid';
}
?>
<div class="wifisearch-index">

    <?=GridView::widget([
        'dataProvider'=>$dataProvider,
        'panel'=>[
            'type'=> 'default',
            'heading'=> Html::a(Yii::t('app', 'WiFi类型统计'),['wifitype'],['class' => 'text-primary']).''.
                Html::tag('span',$gets,['style' => 'display:none','id' => 'get']).''.
                Html::a('',$urlt,['style' => 'display:none','id' => 'urlt']),
        ],
        'columns' => [

            [
                'class'=>'kartik\grid\SerialColumn',
                'contentOptions'=>['class'=>'kartik-sheet-style'],
                'header'=>'序号',
                'headerOptions'=>['class'=>'kartik-sheet-style']
            ],

            [
                'label' => 'WiFi类型',
                'value' => function($date){
                    switch($date['type']){
                        case 0 : $str="需要密码";
                            break;
                        case 1 : $str="无密码";
                            break;
                        case 3 : $str="需要验证";
                            break;
                        case 8 : $str="企业WiFi";
                            break;
                        default : $str = '';
                    }
                    return Html::encode($str);
                }
            ],

            [
                'label' => '<a id="101" href="'.$urlt.'&sort=101" onclick="url()">总连接次数</a>',
                'encodeLabel'=>false,
                'value' => '101'
            ],

            [
                'label' => '<a id="103" href="'.$urlt.'&sort=103" onclick="url()">总连接成功</a>',
                'encodeLabel'=>false,
                'value' => '103'
            ],

            [
                'label' => '<a id="104" href="'.$urlt.'&sort=104" onclick="url()">总连上无网络次数</a>',
                'encodeLabel'=>false,
                'value' => '104'
            ],

            [
                'label' => '<a id="102" href="'.$urlt.'&sort=102" onclick="url()">总失败次数</a>',
                'encodeLabel'=>false,
                'value' => '102'
            ],

            [
                'label' => '<a id="105" href="'.$urlt.'&sort=105" onclick="url()">总密码错误次数</a>',
                'encodeLabel'=>false,
                'value' => '105'
            ],

        ],
    ])?>
    <div align="right" class="form-group">
        <?=Html::a('Back',['wifistatistics/index'], ['class' => 'btn btn-primary'])?>
    </div>
</div>

<script src="js/search.js"></script>