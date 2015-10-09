<?php
$this->registerJs("$('input[name=selection_all]').change(function(){
        var isCheck = $(this).is(':checked');
        if(isCheck){
            $(\"input[name='selection[]']\").each(function(){
                $(this).prop('checked',true);
            });
        }else{
            $(\"input[name='selection[]']\").each(function(){
              $(this).prop('checked',false);
              });
        }
    });
    function getSelection(){
        var data = new Array();
        $(\"input:checkbox[name='selection[]']\").each(function() {
            if ($(this).is(\":checked\") == true) {
                data.push($(this).val());
            }
        });
        return data;
    }
    $('.sign').on('click',function(){
        var role = $(\"input[name='role']\").val();
        var permissions = getSelection();
        if(permissions.length > 0 ){
            var url = '".Yii::$app->urlManager->createUrl(['auth/signpermission'])."';
            $.post(url,{permissions:permissions,role:role},function(data){
                if(data=='ok'){
                    alert('设置成功');
                    window.location.reload();
                }
            })
        }else{
            alert('请选择操作')
        }
    });
");
?>
<div class="container">
    <div class="row">
        <h3>角色:<?= $role ?></h3>
    </div>
    <table class="table table-bordered table-condensed table-striped">
        <input type="hidden" name="role" value="<?= $role ?>">
        <tr>
            <th><input type="checkbox" name="selection_all" value="1"></th>
            <th>操作名称</th>
            <th>操作描述</th>
            <th>规则</th>
            <th>创建时间</th>
            <th>更新时间</th>
        </tr>
        <?php foreach ($Permissions as $v): ?>
            <tr>
                <?php if (in_array($v->name, $RolePermissions)): ?>
                <td><input type="checkbox" name="selection[]" value="<?= $v->name; ?>" checked="checked"></td>
                <?php else: ?>
                    <td><input type="checkbox" name="selection[]" value="<?= $v->name; ?>"></td>
                <?php endif; ?>
                <td><?= $v->name; ?></td>
                <td><?= $v->description; ?></td>
                <td><?= $v->ruleName ?></td>
                <td><?= date('Y-m-d H:i:s', $v->createdAt) ?></td>
                <td><?= date('Y-m-d H:i:s', $v->updatedAt) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <div class="row">
        <a class="btn btn-primary pull-right" href="<?= Yii::$app->urlManager->createUrl('auth/role')?>">返回</a>
        <button class="btn btn-success pull-right sign" style="margin-right:10px;">设置权限</button>
    </div>
</div>