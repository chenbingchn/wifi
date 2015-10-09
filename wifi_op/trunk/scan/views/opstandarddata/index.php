<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Detailed;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\OpstandarddataSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Opstandarddatas';
$this->params['breadcrumbs'][] = $this->title;
$this->registerJsFile('@web/js/updata.js',['depends'=>[\app\assets\AppAsset::className()]]); 
?>
<div class="opstandarddata-index">

    <h1>支付流水</h1>

    <button id="exportFile" type="button" class="btn btn-primary btn-sm pull-right" style="position:relative; top:-10px;">导出</button>

    <?= GridView::widget([
//        'filterModel' => $searchModel,
        'dataProvider' => $dataProvider,
        'columns' => [

            
            'user_id',
//            'dataid',
//            'history_id',
//            'type',
//            'auto_type',
//            'pay',
            'user.user_name',
            'wifi.ssid',
            'wifi.bssid',     
            'wifi.wifi_type',   
            'admin_account',
            [
                    'label'=>'是否结款',
                    'value'=>  function($model){
                           return  $model->pay==1?'已结款':'未结款';
                    }
            ],
        
            [
                'class' => 'yii\grid\ActionColumn',
                'header' => '操作',
                'template' => '{view} {update} {delete} {audit}',
                'buttons' => [
                    'audit' => function ($url, $model, $key) {
                        $row=new Detailed();
                        $rows=$row->Display($model->history_id);
                        return $model->history_id != NULL ?
                            Html::tag('span', '
<button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal'.$key.'">详细信息</button>
<div class="modal fade" id="myModal'.$key.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="" style="margin-top:11%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">'.$model->user_id.'</h4>
            </div>
            <div class="modal-body">
<table align="Center" class="main_tabel" >
        <tr>
            <td class="main_title">物理地址</td>
            <td class="main_title">wifi热点名称</td>
            <td class="main_title">商铺名称</td>
            <td class="main_title">城市</td>
            <td class="main_title">地点</td>
            <td class="main_title">类型</td>
            <td class="main_title">WiFi类型</td>
            <td class="main_title">提交时间</td>
            <td class="main_title">地理位置</td>
        </tr>
        <tr>
            <td class="main_title">'.$rows['bssid'].'</td>
            <td class="main_title">'.$rows['ssid'].'</td>
            <td class="main_title">'.$rows['shop_name'].'</td>
            <td class="main_title">'.$rows['city'].'</td>
            <td class="main_title">'.$rows['address'].'</td>
            <td class="main_title">'.$rows['type'].'</td>
            <td class="main_title">'.$rows['wifi_type'].'</td>
            <td class="main_title"><small class="smalls">'.$times=strtotime($rows['last_change_at']).'</small></td>
            <td class="main_title">
                <div>
                    <span>自动获取的经纬度：</span><br>
                    <span>latitude:'.$rows['latitude'].'</span>
                    <span>longitude:'.$rows['longitude'].'</span>
                    <br>
                    <span>照片获取的经纬度：</span><br>
                    <span>latitude:'.$rows['pic_latitude'].'</span>
                    <span>longitude:'.$rows['pic_longitude'].'</span>
                </div>
            </td>
        </tr>
</table>
<h4 style="border-bottom:1px solid #cccccc; padding-top:10px;">图片</h4>
<p align="center">
    <img src="'.$rows['pic_url1'].'"  width="250px" />
    <img src="'.$rows['pic_url2'].'"  width="250px" />
    <img src="'.$rows['pic_url3'].'"  width="250px" />
    <img src="'.$rows['pic_url4'].'"  width="250px" />
</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

                            ')
                             : '';
                    },
                ],
                'headerOptions' => ['width' => '80'],
            ],
            ['class' => 'yii\grid\CheckboxColumn'],
        ],
    ]); ?>
    <button type="button" class="btn btn-primary btn-sm pull-right batch"  style="width:76px">批量结算</button>
</div>
