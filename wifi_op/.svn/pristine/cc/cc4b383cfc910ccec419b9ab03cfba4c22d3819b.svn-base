$(function() {
    function getSelection(){
        var data = new Array();
        $("input:checkbox[name='selection[]']").each(function() {
            if ($(this).is(":checked") == true) {
                data.push($(this).val());
            }
        });
        return data;
    }
    $('.batch').on('click', function() {
        var data = getSelection();
        if (data.length > 0) {
            $.post("index.php?r=opstandarddata/show", {'selection[]': data});
            alert('更新成功！！');
        } else {
            alert("请选择要更新成功的选项!");
        }
        history.go(0);
    });

    $('.batchSync').on('click', function() {
        var data = getSelection();
        if (data.length > 0) {
            $.post("index.php?r=site/updata", {'selection[]': data});
            alert('同步成功！！');
        } else {
            alert("请选择要同步的选项!");
        }
        history.go(0);
    });
    $('#exportFile').on('click', function(){
        var data = getSelection();
        if (data.length > 0) {
            window.location = 'index.php?r=opstandarddata/export&selection=' + data;
            alert('导出成功！！');
        } else {
            alert("请选择要导出的选项!");
        }
    })
});