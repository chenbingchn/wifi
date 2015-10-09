$(function() {
    $('.NotThrough').on('click', function() {
        var id = $(this).attr('attr_id');
//        window.location.href = "./index.php?r=data/defeat&id=" + id;
        var url = "./index.php?r=data/defeat&id=" + id;
        $.get(url, function(data) {
            if (data == 'ok') {
               alert('操作成功');
            } else {
               alert('操作失败');
            }
        });
    });
    $('.Through').on('click', function() {
        var id = $(this).attr('attr_id');
//        window.location.href = "./index.php?r=data/through&id=" + id;
        var url = "./index.php?r=data/through&id=" + id;
        $.get(url, function(data) {
            if (data == 'ok') {
                alert('操作成功');
            } else {
                alert('操作失败');
            }
        });
    });
    $('.Reset').on('click', function() {
        var id = $(this).attr('attr_id');
//        window.location.href = "./index.php?r=data/reset&id=" + id;
        var url = "./index.php?r=data/reset&id=" + id;
        $.get(url, function(data) {
            if (data == 'ok') {
                alert('操作成功');
            } else {
                alert('操作失败');
            }
        });
    });
    $('input[name=selection_all]').change(function(){
        var isCheck = $(this).is(':checked');
        if(isCheck){
            $("input[name='selection[]']").each(function(){
                console.log($(this));
                $(this).prop('checked',true);
            });
        }else{
            $("input[name='selection[]']").each(function(){
              $(this).prop('checked',false);
              });
        }
    });
    $('#exportWifi').click(function(){
        var data = new Array();
        $("input:checkbox[name='selection[]']").each(function() {
            if ($(this).is(":checked") == true) {
                data.push($(this).val());
            }
        });
        if(data.length ===0){
            alert('请勾选导出项');
        }else{
             window.location = 'index.php?r=data/export&selection=' + data;
            alert('导出成功！！');
        }
    });
});