<?php

use app\models\User;

$this->registerJs("
    $('input[name=selectionRole]').change(function(){
        var isCheck = $(this).is(':checked');
        if(isCheck){
            $(\"input[name='Role[]']\").each(function(){
                $(this).prop('checked',true);
            });
        }else{
            $(\"input[name='Role[]']\").each(function(){
              $(this).prop('checked',false);
              });
        }
    });
    function getRoles(){
        var data = new Array();
        $(\"input:checkbox[name='Role[]']\").each(function() {
            if ($(this).is(\":checked\") == true) {
                data.push($(this).val());
            }
        });
        return data;
    }
    $('.sign').on('click',function(){
        var userId = $(\"input[name='user_id']\").val();
        var roles = getRoles();
        if(roles.length > 0 ){
            var url = '".Yii::$app->urlManager->createUrl(['auth/assigntouser'])."';
            $.post(url,{userId:userId,roles:roles},function(data){
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
        <h3>用户:<?= User::getUsernameByUserId($id) ?></h3>
    </div>
    <input type="hidden" name="user_id" value="<?= $id ?>">
    <table class="table table-bordered table-condensed table-striped">
        <caption><h3>角色</h3></caption>
        <tr>
            <th><input type="checkbox" name="selectionRole" value="1"></th>
            <th>角色名称</th>
            <th>角色描述</th>
            <th>规则</th>
            <th>创建时间</th>
            <th>更新时间</th>
        </tr>
        <?php foreach ($roles as $v): ?>
            <tr>
                <?php if (in_array($v->name, $UserRole)): ?>
                <td><input type="checkbox" name="Role[]" value="<?= $v->name;?>" checked="checked"></td>
                <?php else: ?>
                    <td><input type="checkbox" name="Role[]" value="<?= $v->name; ?>"></td>
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
        <a class="btn btn-primary pull-right" href="<?= Yii::$app->urlManager->createUrl('auth/userlist') ?>">返回</a>
        <button class="btn btn-success pull-right sign" style="margin-right:10px;">设置角色</button>
    </div>
</div>