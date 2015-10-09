<?php
use kartik\grid\GridView;
use yii\helpers\Html;

$this->title = $bssid;
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

    <h3><?= Html::encode($this->title) ?></h3>

    <?=GridView::widget([
        'dataProvider'=>$dataProvider,
        'panel'=>[
            'type'=> 'default',
            'heading'=> Html::a(Yii::t('app', 'WiFi统计信息表'),['wifitype'],['class' => 'text-primary']).''.
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
                'label' => '<a id="bssid" href="'.$urlt.'&sort=bssid" onclick="url()">物理地址</a>',
                'encodeLabel'=>false,
                'value' => 'bssid'
            ],

            [
                'label' => '<a id="101" href="'.$urlt.'&sort=101" onclick="url()">单日连接次数</a>',
                'encodeLabel'=>false,
                'value' => '101'
            ],

            [
                'label' => '<a id="103" href="'.$urlt.'&sort=103" onclick="url()">单日连接成功</a>',
                'encodeLabel'=>false,
                'value' => '103'
            ],

            [
                'label' => '<a id="104" href="'.$urlt.'&sort=104" onclick="url()">单日连上无网络次数</a>',
                'encodeLabel'=>false,
                'value' => '104'
            ],

            [
                'label' => '<a id="102" href="'.$urlt.'&sort=102" onclick="url()">单日失败次数</a>',
                'encodeLabel'=>false,
                'value' => '102'
            ],

            [
                'label' => '<a id="105" href="'.$urlt.'&sort=105" onclick="url()">单日密码错误次数</a>',
                'encodeLabel'=>false,
                'value' => '105'
            ],

            [
                'label' => '<a id="Datetime" href="'.$urlt.'&sort=Datetime" onclick="url()">记录生成日期</a>',
                'encodeLabel'=>false,
                'value' => 'Datetime'
            ],

            [
                'label'=>'连接详细',
                'format'=>'raw',
                'value' => function($data){
                    $url = "./index.php?r=wifistatistics/event&bssid=".$data['bssid'].'&time='.$data['Datetime'];
                    return Html::a('连接详细', $url, ['class' => 'btn btn-default btn-sm','title' => '连接详细']);
                }
            ],

        ],
    ])?>
    <div align="right" class="form-group">
        <?=Html::a('Back',['wifistatistics/index'], ['class' => 'btn btn-primary'])?>
    </div>
</div>

<script src="js/search.js"></script>