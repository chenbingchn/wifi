<?php
use yii\grid\GridView;
use yii\helpers\Html;
use \yii\widgets\LinkPager;
use app\models\Account;
use app\models\Opstandarddata;



?>
<style>
    .container{
        width: 1600px;
    }
</style>
<div class="container">
    <div >
        <h3  class="pull-left">已经过审核的WiFi</h3>
        <div style="margin-top: 20px; margin-bottom: 10px;" class="pull-right">
            <div class="pull-left" style="margin-right:10px;"><?= Html::a('未通过审核', ['data/failure'], ['class' => 'btn btn-primary btn-xs']) ?></div>
            <div class="pull-left"><?= Html::a('已审核通过的', ['data/approved'], ['class' => 'btn btn-primary btn-xs']) ?></div>
        </div>
        <div class="clearfix"></div>
    </div>
  
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            [
                'label' => '用户名称',
                'value' => function($model) {
            return Account::getUsernameByUserId($model->user_id);
        }
            ],
            'orders.bssid',
            'orders.ssid',
            'orders.shop_name',
            'orders.city',
            'orders.wifi_type',
            [
                'label' => '审核状态',
                'value' => function($model) {
                    if ($model->flag == 0) {
                          return '<span class="text-warning">审核中</span>';
                    } elseif ($model->flag == 1) {
                          return '<span class="text-success">审核通过</span>';
                    } else {
                        return '<span class="text-danger">未通过审核</span>';
                    }
                },
                'format'=>'raw',    
            ],
            [
                'label'=>'未通过的原因',
                'value'=>function($model){
                    $return  ="";
                    if($model->flag !=1){
                             if ($model->reason== 0){
                                 $return ="<span class=\"text-danger\">资料有误</span>";
                             }elseif($model->reason== 1){
                                 $return ="<span class=\"text-danger\">密码失效</span>";
                             }elseif($model->reason== 2){
                                 $return ="<span class=\"text-danger\">WIFI类型变更</span>";
                             }
                             $wifiType = [0 => "需要密码wifi", 1 => "需要密码wifi", 5 => "需要密码wifi", 6 => "需要密码wifi", 3 => '免费wifi', 8 => '企业wifi'];
                             if($model->type_change){
                                    $strArray = array();
                                    foreach (explode('-',$model->type_change) as $type) {
                                        $strArray[] = $wifiType[$type];
                                    }
                                    $str = implode(' - ', $strArray);
                                    $return .= "<br/><span class=\"text-danger\" style='display:block'>{$str}</span>";
                             }
                    }
                    if($return==""){
                        $return="<span class=\"text-info\">无<span class=\"text-danger\">";
                    }
                    return $return;
                },
                'format'=>'raw',    
            ],
            [
                    'label'=>'提交时间',
                    'value'=>function($model){
                        return  '<span class="time">'.strtotime($model->created_at).'</span>';
                    },
                    'format'=>'raw',    
            ],
            [
                    'label'=>'更新时间',
                    'value'=>function($model){
                        return  '<span class="time">'.strtotime($model->last_change_at).'</span>';
                    },
                    'format'=>'raw',    
            ],
            [
                'label'=>'其他',
                'value'=>function($model,$key){
                      $key=  uniqid();
                      $img ="";
                      for($i =1;$i<=2;$i++){
                           $pro= 'pic_url'.$i;
                          if($model->orders->$pro){
                              $img .='<img src="'.$model->orders->$pro.'"  width="250px" />';
                          }
                      }
                      if(Yii::$app->controller->action->id == 'approved'||(Yii::$app->controller->action->id == 'examination' && $model->flag == 1)){
                          $button ='<br/><br/><button attr_id="'.$model->dataid.'"  class="btn btn-danger  NotThrough">审核不通过</button>';
                      }else{
                          $button =" ";
                      }
                      return Html::tag('span','<button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal'.$key.'">详细信息</button>'
                              . '<div class="modal fade" id="myModal'.$key.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div>
                                        <div class="modal-content">
                                            <div class="modal-header text-center"><h3>详细信息<h3></div>
                                            <div class="modal-body">
                                            <table class="table  table-condensed text-center">
                                                <tr>
                                                    <td style="width:300px;">地理位置</td>   
                                                    <td>商铺类型</td>
                                                    <td>图片</td>
                                                    <td>审核</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-primary">'.$model->orders->address.'</td>   
                                                    <td class="text-primary">'.$model->orders->type.'</td>
                                                    <td>'.$img.'</td>
                                                    <td>'.$button.'</td>
                                                </tr>
                                            </table>
                                             </div>
                                            <div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Close</button></div>
                                        </div>
                                    </div>
                                </div>');
                },
                'format'=>'raw',    
            ]
        ],
    ]);
    ?>
    <div>
        <?php
        $action = Yii::$app->controller->action->id;
        if ($action != 'examination') {
            echo "<div class=\"pull-right\" id=\"back-examination\" style=\"margin-top: 20px;\">" . Html::a('返回', ['data/examination'], ['class' => 'btn btn-primary', 'style' => 'float: right']) . "</div>";
        } else {
            echo "<div class=\"pull-right\" id=\"back-index\" style=\"margin-top: 20px;\">" . Html::a('返回', ['data/index'], ['class' => 'btn btn-primary', 'style' => 'float: right']) . "</div>";
        }
        ?>
    </div>
</div>
<!--获取当前的Action的名称-->
