<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>积分兑换首页</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=0">
        <meta name="description" content="points mall">
        <link rel="stylesheet" href="<?=$this->config->base_url()?>css/lib/pointmall.css" type="text/css" media="screen" charset="utf-8"/>
        <style>
            .main-content{
                background: #fff;
            }
            .main-content .body li.history-item{ 
                padding-top: 10px;
                border-bottom:10px solid #f6f6f6;
                margin: 0px;
            }
            .main-content .goods-time {
                color: #999;
                font-size: 10px;
            }
           .record_tips{
                padding-top: 45%;
                color: #999;
                font-size: 18px;  
                padding-bottom: 45%;
            }
            .record_tips a{
                color: #F86800;
            }
        </style>
    </head>
    <body>
        <!-- content here -->
        <div class="nav row">
            <div class="back pull-left"></div>
            <div class="title"><?= $this->lang->line('Exchange history')?></div>
        </div>

        <div class="main-content row">
            <?php if ($record) { ?>
                <div class="body row">
                    <ul>
                        <?php foreach ($record as $v): ?>
                            <li class="history-item" url="<?=  site_url("pointmall/detail?id={$v->good->id}&imei=$imei&language=$language&user_id=$user_id&access_token=$access_token") ?>">
                                <a href="<?=  site_url("pointmall/detail?id={$v->good->id}&imei=$imei&language=$language&user_id=$user_id&access_token=$access_token") ?>"><img class="goods-img" src="<?= $v->good->img_url?>"></a>
                                <div class="goods-info">
                                    <p class="goods-title"><?= $v->good->Title ?></p>
                                    <p class="goods-desc">
                                               <?php
                                                if (mb_strlen($v->good->Content) > 45) {
                                                    echo mb_substr($v->good->Content, 0, 45) . ".....";
                                                } else {
                                                    echo $v->good->Content;
                                                }
                                                ?>
                                    </p>
                                    <p class="goods-time">exchange time : <?= $v->buy_date ?></p>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php } else { ?>
                <div class=" record_tips"> 
                    <?= $this->lang->line('You have never exchanged for <a href="" class="jump">any</a> item,Surprise gifts are discount sale, view Points Mall .')?>

                </div>
            <?php } ?>
        </div>
<!--
        弹出框
        <div class="alert" style="display:none;">
            <div class="title">Successfully Exchanged<div class="close"></div></div>
            <div class="body">
                兑换成功提示内容
                <div class="okalert">
                    恭喜您成功兑换<span class="goosname">【商品名】</span>,详情请在兑换记录查看。
                </div>
                兑换成功提示内容结束
                提示框内容
                <div class="tips">
                    价格兑换失败，您的账号已在其他  手机登录
                </div>
                提示内容结束
                兑换成功提示
                <div class="checkbtn">Check it now</div>
                兑换成功提示结束
                提示操作按钮
                <div class="tipsbtn">
                    <div class="sure">知道了</div>
                    <div class="quit">重新登录</div>
                </div>
                提示操作按钮结束
            </div>
        </div>

        遮罩层
        <div class="cover" style="display:none;"></div>-->


        <!-- scripts here -->
        <!--<script type="text/javascript" src="http://libs.baidu.com/jquery/2.1.4/jquery.min.js" charset="utf-8"></script>-->
        <script src="<?=$this->config->base_url()?>js/lib/jquery.min.js" type="text/javascript"></script>
         <script type="text/javascript">
            $(function() {
                $('.pull-left').on('click', function() {
                    window.location.href = "backapp://back";
                });
                $('ul').find('li').on('click',function(){
                     window.location.href=$(this).attr('url');
                });
                var href = "<?php echo site_url("pointmall/index?imei=$imei&language=$language&user_id=$user_id&access_token=$access_token") ?>";
                $('.jump').attr('href',href);
            });
        </script>
    </body>
</html>