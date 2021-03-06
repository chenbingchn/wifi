<?php
use kartik\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

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

<div class="wifistatistics-index">
<?php $form = ActiveForm::begin(['method' => 'get']);?>
    <div class="wifistatistics">
        <div class="row">
            <div class="col-lg-3">
                <?=$form->field($model,'bssid')->textInput()?>
            </div>
            <div class="col-lg-3">
                <?=$form->field($model,'ssid')->textInput()?>
            </div>
            <div class="col-lg-3">
                <?=$form->field($model,'type')->dropDownList(['0' => '需要密码','1' => '登陆验证','3' => '无密码','8' => '企业WiFi'],['prompt' => '请选择'])?>
            </div>
            <div class="col-lg-3">
                <?=$form->field($model,'source')->dropDownList(['0' => '分享的WiFi','1' => 'app收集并上传WiFi','2' => '其他来源并导入','3' => '从扫码版同步过来'],['prompt' => '请选择'])?>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <label class="control-label">WiFi时间</label>
                <?=DatePicker::widget([
                    'model' => $model,
                    'attribute' => 'start_date',
                    'attribute2' => 'end_date',
                    'options' => ['placeholder' => 'Start date'],
                    'options2' => ['placeholder' => 'End date'],
                    'type' => DatePicker::TYPE_RANGE,
                    'form' => $form,
                    'pluginOptions' => [
                        'format' => 'yyyy-m-dd',
                        'autoclose' => true,
                    ]
                ]);?>
            </div>
        </div>
    </div>
    <div align="right" class="form-group" style="margin-top: 10px;">
        <?=Html::submitButton('查询',['class' => 'btn btn-success','style' => 'margin-bottom: 10px;'])?>
        <?=Html::a('重置',['wifistatistics/index'],['class' => 'btn btn-info','style' => 'margin-bottom: 10px;'])?>
    </div>
<?php ActiveForm::end();?>
    <?=GridView::widget([
        'dataProvider'=>$dataProvider,
        'condensed'=> true,
        'pjax'=>true,
        'hover' => true,
        'panel'=>[
            'type'=> 'default',
            'heading'=> Html::a(Yii::t('app', 'WiFi统计信息表'),['wifitype'],['class' => 'text-primary']).''.
                        Html::tag('span',$gets,['style' => 'display:none','id' => 'get']).''.
                        Html::a('',$urlt,['style' => 'display:none','id' => 'urlt']),
        ],
        'toolbar' => [
            ['content'=>
                Html::a('WiFi连接类型',['wifistatistics/type'],['class' => 'btn btn-info']),
            ],
            '{toggleData}',
            '{export}',
        ],

        'columns' => [

            [
                'class'=>'kartik\grid\SerialColumn',
                'contentOptions'=>['class'=>'kartik-sheet-style'],
                'header'=>'序号',
                'headerOptions'=>['class'=>'kartik-sheet-style']
            ],

            ['label'=> 'WiFi名称','value'=> 'ssid'],

            [
                'label' => '<a id="bssid" href="'.$urlt.'&sort=bssid" onclick="url()">物理地址</a>',
                'encodeLabel'=>false,
                'value' => 'bssid'
            ],

            [
                'label' => 'WiFi类型',
                'value' => function($date){
                    switch($date['type']){
                        case 0 : $str="需要密码";
                            break;
                        case 1 : $str="登陆验证";
                            break;
                        case 3 : $str="无密码";
                            break;
                        case 8 : $str="企业WiFi";
                            break;
                        default : $str = '';
                    }
                    return Html::encode($str);
                }
            ],

            [
                'label' => 'WiFi来源',
                'value' => function($date){
                    switch($date['source']){
                        case 0 : $str="分享的WiFi";
                            break;
                        case 1 : $str="app上传";
                            break;
                        case 2 : $str="其他来源";
                            break;
                        case 3 : $str="扫码版上传";
                            break;
                        default : $str = '';
                    }
                    return Html::encode($str);
                }
            ],

            [
                'label' => '<a id="created_at" href="'.$urlt.'&sort=created_at" onclick="url()">WiFi生成日期</a>',
                'encodeLabel'=>false,
                'value' => 'created_at'
            ],

            [
                'label' => '<a id="101" href="'.$urlt.'&sort=101" onclick="url()">点击连接次数</a>',
                'encodeLabel'=>false,
                'value' => '101'
            ],

            [
                'label' => '<a id="103" href="'.$urlt.'&sort=103" onclick="url()">点击连接成功</a>',
                'encodeLabel'=>false,
                'value' => '103'
            ],

            [
                'label' => '<a id="104" href="'.$urlt.'&sort=104" onclick="url()">连上无网络次数</a>',
                'encodeLabel'=>false,
                'value' => '104'
            ],

            [
                'label' => '<a id="102" href="'.$urlt.'&sort=102" onclick="url()">连接失败次数</a>',
                'encodeLabel'=>false,
                'value' => '102'
            ],

            [
                'label' => '<a id="105" href="'.$urlt.'&sort=105" onclick="url()">密码错误次数</a>',
                'encodeLabel'=>false,
                'value' => '105'
            ],

            [
                'label'=>'',
                'format'=>'raw',
                'value' => function($data){
                    $url = "./index.php?r=wifistatistics/detailed&bssid=".$data['bssid'];
                    return Html::a('每日连接', $url, ['class' => 'btn btn-link','title' => '每日连接']);
                }
            ],

        ],
    ]);
    ?>

</div>

<script src="js/search.js"></script>
