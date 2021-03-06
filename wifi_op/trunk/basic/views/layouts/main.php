﻿<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);

$this->beginPage()
?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <?= Html::csrfMetaTags() ?>
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>
        <div class="navbar navbar-default" id="navbar">
            <div class="navbar-container" id="navbar-container">
                <div class="navbar-header pull-left">
                    <a href="#" class="navbar-brand">
                        <small>
                            <i class="icon-leaf"></i>
                            ENJOY WIFI 后台管理系统
                        </small>
                    </a><!-- /.brand -->
                </div><!-- /.navbar-header -->

                <div class="navbar-header pull-right" role="navigation">
                </div><!-- /.navbar-header -->
            </div><!-- /.container -->
            <?php if (Yii::$app->user->isGuest) { ?>
                <a  class="pull-right" style="line-height:45px;color:white;font-size: 16px;margin-right:10px;" data-method="post" href="<?= Yii::$app->urlManager->createUrl('site/login') ?>"> 登录</a>
            <?php }else{ ?>
                <a  class="pull-right" style="line-height:45px;color:white;font-size: 16px;margin-right:10px;" data-method="post" href="<?= Yii::$app->urlManager->createUrl('site/logout') ?>"> Logout (<?= Yii::$app->user->identity->username ?>)</a>
            <?php }?>
        </div>

        <div class="main-container" id="main-container">
            <div class="main-container-inner">
                <div class="sidebar" id="sidebar">
                    <ul class="nav nav-list">
                        <li>
                            <a href="#" class="dropdown-toggle">
                                <i class="icon-desktop"></i>
                                <span class="menu-text"> 权限控制 </span>

                                <b class="arrow icon-angle-down"></b>
                            </a>

                            <ul class="submenu">
                                <li>
                                    <a href="<?= Yii::$app->urlManager->createUrl('auth/role') ?>">
                                        <i class="icon-double-angle-right"></i>
                                        角色列表
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= Yii::$app->urlManager->createUrl('auth/permission') ?>">
                                        <i class="icon-double-angle-right"></i>
                                        操作列表
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= Yii::$app->urlManager->createUrl('auth/userlist') ?>">
                                        <i class="icon-double-angle-right"></i>
                                        用户列表
                                    </a>
                                </li>
                            </ul>
                        </li>


                        <li>
                            <a href="#" class="dropdown-toggle">
                                <i class="icon-desktop"></i>
                                <span class="menu-text"> 运营管理 </span>

                                <b class="arrow icon-angle-down"></b>
                            </a>

                            <ul class="submenu">
                                <li>
                                    <a href="<?= Yii::$app->urlManager->createUrl('prize/index') ?>">
                                        <i class="icon-double-angle-right"></i>
                                        WiFi抽奖
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= Yii::$app->urlManager->createUrl('award/index') ?>">
                                        <i class="icon-double-angle-right"></i>
                                        WiFi抽奖（新）
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= Yii::$app->urlManager->createUrl('integral/index') ?>">
                                        <i class="icon-double-angle-right"></i>
                                        积分商城
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= Yii::$app->urlManager->createUrl('integralcategory/index') ?>">
                                        <i class="icon-double-angle-right"></i>
                                        积分商城分类
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= Yii::$app->urlManager->createUrl('push/index') ?>">
                                        <i class="icon-double-angle-right"></i>
                                        推送页面
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= Yii::$app->urlManager->createUrl('raiders/index') ?>">
                                        <i class="icon-double-angle-right"></i>
                                        积分攻略
                                    </a>
                                </li>
<!--                                <li>
                                    <a href="<?= Yii::$app->urlManager->createUrl('sharedwifipage/index') ?>">
                                        <i class="icon-double-angle-right"></i>
                                        首页分享WiFi页
                                    </a>
                                </li>-->
                                <li>
                                    <a href="<?= Yii::$app->urlManager->createUrl('article/index') ?>">
                                        <i class="icon-double-angle-right"></i>
                                        赚取积分
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= Yii::$app->urlManager->createUrl('share/index') ?>">
                                        <i class="icon-double-angle-right"></i>
                                        首页下标题
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= Yii::$app->urlManager->createUrl('banner/index') ?>">
                                        <i class="icon-double-angle-right"></i>
                                        APP banner
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= Yii::$app->urlManager->createUrl('events/index') ?>">
                                        <i class="icon-double-angle-right"></i>
                                        运营活动
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= Yii::$app->urlManager->createUrl('scoreconfig/index') ?>">
                                        <i class="icon-double-angle-right"></i>
                                        积分配置
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="dropdown-toggle">
                                        <i class="icon-double-angle-right"></i>
                                        <b>消息中心</b>
                                        <b class="arrow icon-angle-down"></b>
                                    </a>

                                    <ul class="submenu">
                                        <li>
                                            <a href="<?= Yii::$app->urlManager->createUrl('activity/index') ?>">
                                                <i class="icon-leaf"></i>
                                                群发消息(消息中心)
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?= Yii::$app->urlManager->createUrl('push/list') ?>">
                                                <i class="icon-leaf"></i>
                                                PUSH
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li>
                                    <a href="#" class="dropdown-toggle">
                                        <i class="icon-double-angle-right"></i>
                                        <b>discover</b>
                                        <b class="arrow icon-angle-down"></b>
                                    </a>

                                    <ul class="submenu">
                                        <li>
                                            <a href="<?= Yii::$app->urlManager->createUrl('findcontent/index') ?>">
                                                <i class="icon-leaf"></i>
                                                发现页icon
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?= Yii::$app->urlManager->createUrl('categorys/index') ?>">
                                                <i class="icon-leaf"></i>
                                                发现页小类别
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?= Yii::$app->urlManager->createUrl('mainclass/index') ?>">
                                                <i class="icon-leaf"></i>
                                                发现页大类别
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="dropdown-toggle">
                                <i class="icon-desktop"></i>
                                <span class="menu-text"> 用户行为统计 </span>

                                <b class="arrow icon-angle-down"></b>
                            </a>

                            <ul class="submenu">
                                <li>
                                    <a href="<?= Yii::$app->urlManager->createUrl('account/index') ?>">
                                        <i class="icon-double-angle-right"></i>
                                        用户信息
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= Yii::$app->urlManager->createUrl('imeiuserbasicinfo/index') ?>">
                                        <i class="icon-double-angle-right"></i>
                                        用户设备数据
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= Yii::$app->urlManager->createUrl('account/scorestream') ?>">
                                        <i class="icon-double-angle-right"></i>
                                        积分流水
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= Yii::$app->urlManager->createUrl(['account/getscorehistory']) ?>">
                                        <i class="icon-double-angle-right"></i>
                                        积分获取流水
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= Yii::$app->urlManager->createUrl(['account/spendscorehistory']) ?>">
                                        <i class="icon-double-angle-right"></i>
                                        积分兑换流水
                                    </a>
                                </li>
<!--                                <li>
                                    <a href="">
                                        <i class="icon-double-angle-right"></i>
                                        用户分享的wifi列表
                                    </a>
                                </li>-->
                                <li>
                                    <a href="<?= Yii::$app->urlManager->createUrl('feedback/index') ?>">
                                        <i class="icon-double-angle-right"></i>
                                        Feedback
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="#" class="dropdown-toggle">
                                <i class="icon-desktop"></i>
                                <span class="menu-text"> wifi数据统计 </span>

                                <b class="arrow icon-angle-down"></b>
                            </a>

                            <ul class="submenu">
                                <li>
                                    <a href="<?= Yii::$app->urlManager->createUrl('account/wifi') ?>">
                                        <i class="icon-double-angle-right"></i>
                                        wifi列表
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= Yii::$app->urlManager->createUrl('wifistatistics/index') ?>">
                                        <i class="icon-double-angle-right"></i>
                                        wifi统计信息表
                                    </a>
                                </li>
<!--                                <li>
                                    <a href="">
                                        <i class="icon-double-angle-right"></i>
                                        wifi连接记录<br/>(按BSSID)
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <i class="icon-double-angle-right"></i>
                                        wifi连接记录<br/>(按WIFI类型)
                                    </a>
                                </li>-->
                            </ul>
                        </li>
                    </ul><!-- /.nav-list -->
                </div>

                <div class="main-content" style="overflow-x: scroll;min-height:800px;">
                    <div class="page-content">
                        <?= $content ?>
                    </div><!-- /.main-container-inner -->

                </div><!-- /.main-container -->
            </div>
            <?php $this->endBody() ?>
    </body>
    <script>
//        var href = '<?= Yii::$app->request->url; ?>';
        var href = '<?= Yii::$app->urlManager->createUrl(Yii::$app->controller->id."/".Yii::$app->controller->action->id)?>';
        $(function() {
//             $("[href='"+href+"']").closest('li').addClass('active').closest('ul').show().closest('li').addClass('open').closest('ul').show().closest('li').addClass('open');
            var link = $("[href='" + href + "']").closest('li').addClass('active');
            link.parents('ul').show();
            link.parents('li').addClass('open');
        });
    </script>
</html>
<?php $this->endPage() ?>

