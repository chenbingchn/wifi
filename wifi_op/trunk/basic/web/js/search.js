/**
 * Created by chuyang on 15/9/11.
 */
function url(){
    var gett = document.getElementById('get').innerHTML;
    var urlt = document.getElementById('urlt').href;
    var ch= gett.indexOf('-');
    if(ch < 0){
        var str = ''+urlt+'&sort=-'+gett+'';
        document.getElementById(''+gett+'').href= str;
    }else{
        var strs = gett.substring(1);
        var str = ''+urlt+'&sort='+strs+'';
        document.getElementById(''+strs+'').href= str;
    }
}
