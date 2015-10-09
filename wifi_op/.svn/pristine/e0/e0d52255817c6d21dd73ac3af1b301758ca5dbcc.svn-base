<div class="container">
    <div class="row" style="margin-bottom:10px;">
        <a href="<?= Yii::$app->urlManager->createUrl('auth/createrole') ?>" class="btn btn-success pull-right">创建角色</a>
    </div>
    <table class="table table-bordered table-striped table-condensed">
        <tr>
            <th>角色名</th>
            <th>描述</th>
            <th>创建时间</th>
            <th>更新时间</th>
            <th>操作</th>
        </tr>
        <?php foreach ($roles as $v): ?>
            <tr>
                <td><?= $v->name ?></td>
                <td><?= $v->description ?></td>
                <td><?= date('Y-m-d H:i:s', $v->createdAt) ?></td>
                <td><?= date('Y-m-d H:i:s', $v->updatedAt) ?></td>
                <td>
                    <a href="<?= Yii::$app->urlManager->createUrl(['auth/updaterole','id'=>$v->name])?>" title="更新" data-pjax="0">
                        <span class="glyphicon glyphicon-pencil"></span>
                    </a> 
                    <a href="<?= Yii::$app->urlManager->createUrl(['auth/deleterole','id'=>$v->name])?>" title="删除" data-confirm="您确定要删除此项吗？" data-method="post" data-pjax="0">
                        <span class="glyphicon glyphicon-trash"></span>
                    </a>
                    <a href="<?= Yii::$app->urlManager->createUrl(['auth/rolesignpermission','role'=>$v->name])?>" title="设置权限" >
                        <span class="glyphicon glyphicon-cog"></span>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>