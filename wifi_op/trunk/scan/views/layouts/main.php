<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>
    <div class="wrap">
        <?php
        NavBar::begin([
            'brandLabel' => 'Scan Code',
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'navbar-inverse navbar-fixed-top',
            ],
        ]);
//        $menuItems = [
//            '<li class="dropdown">',
//            '<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">菜单目录<span class="caret"></span></a>',
//            '<ul class="dropdown-menu" role="menu">',
//                '<li><a href="index.php?r=account/index">用户生成</a></li>',
//                '<li><a href="index.php?r=data/index">wifi热点</a></li>',
//                '<li><a href="index.php?r=opstandarddata/index">用户流水账</a></li>',
//                '<li><a href="index.php?r=site/synchronous">同步Wifi</a></li>',
//            '</ul>',
//            '</li>',
//        ];
        if (Yii::$app->user->isGuest) {
            $menuItems[] = ['label' => '登录', 'url' => ['/site/login']];
        } else {
            $menuItems[] = [
                'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                'url' => ['/site/logout'],
                'linkOptions' => ['data-method' => 'post']
            ];
        }
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => $menuItems,
        ]);
        NavBar::end();
        ?>
        <?php $controller = Yii::$app->controller->id;
                    $action = Yii::$app->controller->action->id;
        ?>
        <div class="container">
            <div class="pull-left col-md-2 nav_list">
                <a href="index.php?r=site/index" class="list-group-item <?php if($controller=='site'&&$action=='index'){ echo 'active';}?>">首页</a>
                <a href="index.php?r=account/index" class="list-group-item <?php if($controller=='account'){ echo 'active';}?>">用户管理</a>
                <a href="index.php?r=data/index" class="list-group-item <?php if($controller=='data'){ echo 'active';}?>">wifi热点</a>
                <a href="index.php?r=opstandarddata/index" class="list-group-item <?php if($controller=='opstandarddata'){ echo 'active';}?>">支付管理</a>
                <a href="index.php?r=site/synchronous" class="list-group-item <?php if($controller=='site'&&$action!='index'){ echo 'active';}?>">wifi同步</a>
            </div>
            <div class="pull-right col-md-10">
            <?= $content ?>     
            </div>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; My Company <?= date('Y') ?></p>
            <p class="pull-right"><?= Yii::powered() ?></p>
        </div>
    </footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
