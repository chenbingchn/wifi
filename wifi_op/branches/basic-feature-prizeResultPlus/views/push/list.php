<?php

use dosamigos\datepicker\DatePicker;
use yii\grid\GridView;
use app\models\User;
?>
<div class="container">
    <div class="row">
        <h3 class="pull-left">Push 页</h3>
        <a  href="<?= Yii::$app->urlManager->createUrl('push/createpush') ?>" class="btn btn-success pull-right" style="margin-top: 20px;">新增push</a>
    </div>

    <form method="get" action="/index.php" class="form-horizontal">
        <input type="hidden" name="r" value="push/list">
        <div class="row">
            <div class="col-md-6">
                <label>开始时间</label>
                <?=
                DatePicker::widget([
                    'name' => 'start_time',
                    'value' => empty($_GET['start_time'])?'':$_GET['start_time'],
                    'clientOptions' => [
                        'format' => 'yyyy-mm-dd',
                    ]
                ]);
                ?>
            </div>
            <div class="col-md-6">
                <label>结束时间</label>
                <?=
                DatePicker::widget([
                    'name' => 'end_time',
                    'value' => empty($_GET['end_time'])?'':$_GET['end_time'],
                    'clientOptions' => [
                        'format' => 'yyyy-mm-dd',
                    ]
                ]);
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label>创建人</label>
                <input type="text" value="<?= empty($_GET['pushUser'])?'':$_GET['pushUser']?>" name="pushUser" class="form-control">
            </div>
            <div class="col-md-6">
                <label>跳转的页面</label>
                <select name="junmPage" class="form-control">
                    <option value="" <?= isset($_GET['junmPage'])&&$_GET['junmPage']==""?'selected=selected':''?>> 请选择 </option>
                    <option value="1" <?= isset($_GET['junmPage'])&&$_GET['junmPage']==1?'selected=selected':''?>>首页</option>
                    <option value="2" <?= isset($_GET['junmPage'])&&$_GET['junmPage']==2?'selected=selected':''?>>Discover</option>
                    <option value="3" <?= isset($_GET['junmPage'])&&$_GET['junmPage']==3?'selected=selected':''?>>Mine</option>
                    <option value="4" <?= isset($_GET['junmPage'])&&$_GET['junmPage']==4?'selected=selected':''?>>Map</option>
                    <option value="5" <?= isset($_GET['junmPage'])&&$_GET['junmPage']==5?'selected=selected':''?>>Points Mall</option>
                    <option value="6" <?= isset($_GET['junmPage'])&&$_GET['junmPage']==6?'selected=selected':''?>>Earn Points</option>
                    <option value="7" <?= isset($_GET['junmPage'])&&$_GET['junmPage']==7?'selected=selected':''?>>Setting</option>
                    <option value="0" <?= isset($_GET['junmPage'])&&$_GET['junmPage']!=""&&$_GET['junmPage']==0?'selected=selected':''?>>Webview</option>
                </select>
            </div>
        </div>
        <div class="row" style="margin-top: 10px;">
            <input type="submit" value="查询" class="btn btn-primary pull-right">
        </div>
    </form>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'title',
            'content',
            [
                'attribute' => 'create_user',
                'value' => function($model) {
            return User::getUsernameByUserId($model->create_user);
        }
            ],
            [
                'attribute' => 'jump_page',
                'value' => function($model) {
            $relation = ['Webview', '首页', 'Discover', 'Mine', 'Map', 'Points Mall', 'Earn Points', 'Setting'];
            return $relation[$model->jump_page];
        }
            ],
            [
                'attribute' => 'create_time',
                'value' => function($model) {
            return date('Y-m-d H:i:s', $model->create_time);
        }
            ],
//                'create_time',
        ],
    ]);
    ?>
</div>