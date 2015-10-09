<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Share;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\ShareSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Shares';
$this->params['breadcrumbs'][] = $this->title;
$id=Share::find()->count();
?>
<div class="share-index">

    <h1>首页下标题</h1>

    <?php
        if($id < 9) {
            echo '<p>';
            echo Html::a('Create Share', ['create'], ['class' => 'btn btn-success']);
            echo '</p>';
        }

        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [

                'color_value',
                [
                    'label' => '<div style="width: 150px;">Type</div>',
                    'attribute' => 'type',
                    'encodeLabel'=>false,
                    'value' => function($date){
                        $id = $date->id;
                        switch($id){
                            case 1 : $str="有钥匙的WiFi";
                                break;
                            case 2 : $str="无钥匙的WiFi";
                                break;
                            case 3 : $str="密码框输入框下标";
                                break;
                            case 4 : $str="赚积分入口";
                                break;
                            case 5 : $str="积分商城入口";
                                break;
                            case 6 : $str="分享给朋友入口";
                                break;
                            case 7 : $str="我分享的WiFi入口";
                                break;
                            case 8 : $str="活动页面入口";
                                break;
                            case 10 : $str="开机启动页";
                                break;
                            case 11 : $str="分享wifi页(未被分享)";
                                break;
                            case 12 : $str="分享wifi页(自己分享)";
                                break;
                            case 13 : $str="分享wifi页(被别人分享)";
                                break;
                            case 14 : $str="未被分享(标题1)";
                                break;
                            case 15 : $str="未被分享(标题2)";
                                break;
                            case 16 : $str="自己分享(标题1)";
                                break;
                            case 17 : $str="自己分享(标题2)";
                                break;
                            case 18 : $str="被别人分享(标题1)";
                                break;
                            case 19 : $str="被别人分享(标题2)";
                                break;
                            default : $str = $id;
                        }
                        return Html::encode($str);
                    },
                ],
                'icon',
                'title',
                'titlezh',
                'titleyn',
                'max_value',
                'min_value',
                'pic_url',

                ['class' => 'yii\grid\ActionColumn','header' => 'Operation','template' => '{update}'],
            ],
        ]);
    ?>

</div>
