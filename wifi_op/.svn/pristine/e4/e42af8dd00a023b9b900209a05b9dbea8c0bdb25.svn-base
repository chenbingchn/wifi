<?php

use yii\helpers\Html;
use \yii\widgets\LinkPager;
?>

<div class="container">
    <h3>需要提交审核的wifi</h3>
    <table  class="table table-bordered table-striped table-condensed" >
        <thead>
        <td >用户ID</td>
        <td >物理地址</td>
        <td >wifi热点名称</td>
        <td >商铺名称</td>
        <td >城市</td>
        <td >地点</td>
        <td >类型</td>
        <td >WiFi类型</td>
        <td>操作</td>
        <td>审核</td>
        </thead>
        <?php foreach ($Article as $k => $v): ?>
            <tr>
                <td class="text-center"><?= Html::encode($v['user_id']) ?></td>
                <td class="text-center"><span ><?= $v['orders']['bssid'] ?></span></td>
                <td class="text-center"><span ><?= $v['orders']['ssid'] ?></span></td>
                <td class="text-center"><span ><?= $v['orders']['shop_name'] ?></span></td>
                <td class="text-center"><span ><?= $v['orders']['city'] ?></span></td>
                <td class="text-center"><span ><?= $v['orders']['address'] ?></span></td>
                <td class="text-center"><span ><?= $v['orders']['type'] ?></span></td>
                <td class="text-center"><span ><?= $v['orders']['wifi_type'] ?></span></td>
                <td class="text-center"><button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal<?= $k ?>">更多</button></td>
                <td class="text-center" style="width:180px;">
                    <?php if($v['flag'] == 0){?>
                    <button attr_id="<?=$v['dataid']?>" class="btn btn-success btn-xs pull-left Through" onclick="submint('<?= $v['dataid'] ?>', 1)">审核通过</button>
                    <button attr_id="<?=$v['dataid']?>" class="btn btn-danger btn-xs pull-right NotThrough" onclick="submint('<?= $v['dataid'] ?>', 2)">审核未通过</button>
                    <?php }?>
                </td>
            </tr>
            <div class="modal fade" id="myModal<?= $k ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" style="margin-top:10%">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">拍摄图片</h4>
                        </div>
                        <div class="modal-body">
                            <?php for($i=1;$i<5;$i++){
                            if($v['orders']['pic_url'.$i.''] == NULL){
                            break;
                            }
                            echo '<img src="'.$v['orders']['pic_url'.$i.''].'" width="250px" style="padding-right:10px;" />';
                            }?>
                            <div>
                                <span>自动获取的经纬度：</span>
                                <span>latitude:<?= $v['orders']['latitude'] ?></span>
                                <span>longitude:<?= $v['orders']['longitude'] ?></span>
                                <br>
                                <span>照片获取的经纬度：</span>
                                <span>latitude:<?= $v['orders']['pic_latitude'] ?></span>
                                <span>longitude:<?= $v['orders']['pic_longitude'] ?></span>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </table>
    <div style="padding-top: 20px;"><?= Html::a('返回',  Yii::$app->request->getReferrer(), ['class' => 'btn btn-primary', 'style' => 'float: right']) ?></div>
</div>