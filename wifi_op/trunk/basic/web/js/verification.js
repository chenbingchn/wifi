$(function(){
    var id = $('#scoreconfig-id').val();
    var limitconfig = $('.field-scorelimitconfig-limits');
    $('#w0').submit(function(event){
        var score = $('#scoreconfig-score').val();
        var limits = $('#limits').val();
        var num = limits/score;
        if(id>1 && id<6){
            if(parseInt(num)==num){
                limitconfig.addClass('form-group field-scorelimitconfig-limits has-success');
                return true;
            }else{
                event.preventDefault();
                event.stopImmediatePropagation();
                limitconfig.addClass('form-group field-scorelimitconfig-limits has-error');
                limitconfig.children('.help-block').html('积分上限必须是积分配额的整数倍！！');
                return false;
            }
        }else{
            limitconfig.addClass('form-group field-scorelimitconfig-limits has-success');
            return true;
        }
    });

});