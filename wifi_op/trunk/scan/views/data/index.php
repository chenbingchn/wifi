<?php

use yii\helpers\Html;
use \yii\widgets\LinkPager;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
?>
<div class="container">

    <?php $form = ActiveForm::begin(['method' => 'get']); ?>


    <div class="row">
        <div class="col-md-3">
            <?= $form->field($model, 'user_id')->textInput() ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'ssid')->textInput() ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'city')->textInput() ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'address')->textInput() ?>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'shop_type')->dropDownList([
                'Restaurant' => 'Restaurant', 
                'Shopping mall' => 'Shopping mall', 
                'Hotels' => 'Hotels', 
                'Recreation' => 'Recreation', 
                'Healthcare' => 'Healthcare', 
                'Attractions' => 'Attractions', 
                'Education' => 'Education', 
                'Transportation' => 'Transportation', 
                'Residential District' => 'Residential District', 
                'Business' => 'Business', 
                'Others' => 'Others', 
                'Transportation' => 'Transportation', 
                'Domestic' => 'Domestic'
                ], 
                ['prompt' => '请选择']) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'type')->dropDownList(['0' => 'Need password', '1' => 'Web Auth needed', '2' => 'No password', '3' => 'Operator WiFi', '4' => 'Others'], ['prompt' => '请选择']) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'flag')->dropDownList(['0' => '审核中', '1' => '已通过审核', '2' => '未通过审核',], ['prompt' => '请选择']) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <h4>开始时间</h4>
            <div style="padding-bottom: 15px;">
                <?=
                DatePicker::widget([
                    'model' => $model,
                    'attribute' => 'start',
                    'template' => '{addon}{input}',
                    'clientOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy-mm-dd',
                    ]
                ]);
                ?>
            </div>
        </div>
        <div class="col-md-6">
            <h4>结束时间</h4>
            <div style="padding-bottom: 15px;">
                <?=
                DatePicker::widget([
                    'model' => $model,
                    'attribute' => 'end',
                    'template' => '{addon}{input}',
                    'clientOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy-mm-dd',
                    ]
                ]);
                ?>
            </div>
        </div>
    </div>
    <?= Html::submitButton('提交', ['class' => 'btn btn-success', 'style' => 'float:right;']) ?>
    <?php ActiveForm::end(); ?>


    <h2>分享wifi热点</h2>

    <div style="margin-bottom:10px">
        <div class="pull-left">
            总记录数:<?= $pagination->totalCount ?>
        </div>   
        <div class="pull-right">
            <button id="exportWifi" type="button" class="btn btn-primary">导出</button> 
        </div> 
        <div class="clearfix">
            
        </div>
    </div>

    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>
    <table class="table table-bordered table-condensed table-striped" >
        <thead>
         <td>
            <input type="checkbox" name="selection_all" value="1">
        </td>
        <td class="text-nowrap">用户名</td>
        <td class="text-nowrap">物理地址</td>
        <td class="text-nowrap">wifi热点名称</td>
        <td class="text-nowrap">商铺名称</td>
        <td class="text-nowrap">城市</td>
<!--        <td class="text-nowrap">地点</td>
        <td class="text-nowrap">类型</td>-->
        <td class="text-nowrap">WiFi类型</td>
        <td class="text-nowrap">审核状态</td>
        <td class="text-nowrap">提交时间</td>
        <td class="text-nowrap">ping</td>
        <td class="text-nowrap">详细内容</td>
        </thead>
        <?php foreach ($test as $k => $v): ?>
            <tr>
                 <td>
                    <input type="checkbox" name="selection[]" value="<?= $v['user_id'].'-'.$v['bssid']?>">
                </td>
                <?php $id = $v['user_id'] ?>
                <?php $times = strtotime($v['created_at']) ?>
                <td class="text-center"><?= Html::encode(app\models\Account::getUsernameByUserId($v['user_id'])) ?></td>
                <td class="text-center">
                    <?= Html::a('' . $v['orders']['bssid'] . '', ['data/show','bssid'=>$v['orders']['bssid']], ['class' => 'btn btn-default']) ?>
                </td>
                <td class="text-center"><?= Html::encode($v['orders']['ssid']) ?></td>
                <td class="text-center"><?= Html::encode($v['orders']['shop_name']) ?></td>
                <td class="text-center"><?= Html::encode($v['orders']['city']) ?></td>
<!--                <td class="text-center"><?= Html::encode($v['orders']['address']) ?></td>
                <td class="text-center"><?= Html::encode($v['orders']['type']) ?></td>-->
                <td class="text-center"><?= Html::encode($v['orders']['wifi_type']) ?>
                    <?php
                    if ($v['orders']['capabilities'] == 0) {
                        echo "<br/>(Need password)";
                    } elseif ($v['orders']['capabilities'] == 1) {
                        echo "<br/>(Web Auth needed)";
                    } elseif ($v['orders']['capabilities'] == 2) {
                        echo "<br/>(No password)";
                    } elseif ($v['orders']['capabilities'] == 3) {
                        echo "<br/>(Operator WiFi)";
                    } elseif ($v['orders']['capabilities'] == 4) {
                        echo "<br/>(Others)";
                    }
                    ?>
                </td>

                <td class="text-center text-nowrap">
                    <?php if ($v['flag'] == 0) { ?>
                        <span class="text-warning">审核中</span>
                    <?php } elseif ($v['flag'] == 1) { ?>
                        <span class="text-success">已通过审核</span>
                    <?php } else { ?>
                        <span class="text-danger">未通过审核</span>
                    <?php } ?>    
                </td>
                <td class="text-center"><small class="time"><?= Html::encode($times) ?></small></td>
                <td class="text-center"><small><?= Html::encode($v['orders']['threeg_ping']) ?><br><br><?= Html::encode($v['orders']['wifi_ping']) ?></small></td>
                 <td class="text-center" style="text-align: center;">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal<?= $k ?>">详情</button>
                </td>
            </tr>


            <div class="modal fade" id="myModal<?= $k ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title text-center" id="myModalLabel">详细信息</h4>
                        </div>
                        <div class="modal-body text-center">
                            <div class="row ">
                                    <div class="col-md-2 text-center"  style="font-weight:bold;">地理位置</div>
                                    <div class="col-md-2 text-center" style="font-weight:bold;" >商铺类型</div>
                                    <div class="col-md-6 text-center" style="font-weight:bold;" >图片</div>
                                    <div class="col-md-2 text-center"  style="font-weight:bold;">审核</div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2 text-center text-info" style="margin-top:20px;"><?= Html::encode($v['orders']['address']) ?></div>
                                    <div class="col-md-2 text-center text-info" style="margin-top:20px;"><?= Html::encode($v['orders']['type']) ?></div>
                                   <div class="col-md-6 text-center text-info" >    
                                        <?php
                                        for ($i = 1; $i < 5; $i++) {
                                            if ($v['orders']['pic_url' . $i . ''] == NULL) {
                                                break;
                                            }
                                            echo '<img src="' . $v['orders']['pic_url' . $i . ''] . '" width="250px" style="padding-right:10px;" />';
                                        }
                                        ?>
                                    </div>
                            <div class="col-md-2 text-center">
                                <?php if($v['flag'] == 0){ ?>
                                <br/> <br/><br/>
                                <button  attr_id="<?= $v['dataid'] ?>" class="btn btn-success Through">审核通过</button>
                                <br/> <br/><br/>
                                <button attr_id="<?= $v['dataid'] ?>"  class="btn btn-danger  NotThrough">审核不通过</button>
                                <?php } ?>
                                <?php if($v['flag'] == 1){ ?>
                                <br/> <br/><br/>
                                <button attr_id="<?= $v['dataid'] ?>"  class="btn btn-danger  NotThrough">审核不通过</button>
                                <?php } ?>
                            </div>
                                </div>
                        </div>

                        <div class="modal-footer">
                            <button  class="btn btn-default btn-danger" data-dismiss="modal">关闭</button>
                        </div>
                    </div>
                </div>
            </div>
<?php endforeach; ?>
    </table>
    <div class="row">
        <div class="pull-left"><?= LinkPager::widget(['pagination' => $pagination,]) ?></div>
        <div class="pull-right" style="margin-top: 20px;"><?= Html::a('已经过审核的WiFi', ['data/examination'], ['class' => 'btn btn-primary']) ?></div>
    </div>
    <style>
        .modal-dialog{
            width: 1100px;
        }
    </style>
</div>

