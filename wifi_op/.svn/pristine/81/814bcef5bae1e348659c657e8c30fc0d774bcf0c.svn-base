<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/bootstrap.min.css" rel="stylesheet">
<script src="http://cdn.bootcss.com/jquery/1.11.2/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<link href="css/wifi.css" rel="stylesheet" />
<script>
    function test(a){
        var b=a;
        var img=document.getElementById('img'+b);
        var width = img.scrollWidth;
        var height = img.scrollHeight;
        document.getElementById("imgc"+b).style.display ="";
        document.getElementById("imgc"+b).style.width =width+"px";
        document.getElementById("imgc"+b).style.height =height+"px";
        document.getElementById("imgc"+b).style.marginLeft ="-"+width+"px";
    }
</script>

<div class="container top-colos navl">
    <div>
        <div class="pic"><a href="backapp://back"><img src="images/Left.png" height="30" /></a></div>
        <div align="center" class="word">Poins Mall</div>
    </div>
</div>
<div class="container contents">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12" style=" padding-left: 0px; padding-right: 0px;">
            <table>
            	<tr>
                    <td>
<?php
$i=1;
foreach($row as $k=>$v){

echo '<div style="float: left;width: 50%; border: 3px solid #F0F3F5" onclick="test('.$k.')">';
echo '<a class="" data-toggle="modal" data-target="#myModal'.$v['id'].'" >';
echo '<img id="img'.$k.'" src="'.$v['img_url'].'" width="100%" />';
echo  '<span class="fire" style="display:none;" id="imgc'.$k.'"><h1 style="padding-top:20%">卖光了</h1></span>';
echo '<span class="row">';
echo '<span class="col-xs-10 col-sm-10 col-md-10 black">';
echo '<p class="p">'.$v['Title'].'</p>';
echo '</span>';
echo '<span class="col-xs-2 col-sm-2 col-md-2 black">';
echo '<div class="smalls"><div style="float: left;"><img src="images/Dollar.png" width="18" /></div>&nbsp;<div style="float: right; margin-top: 2px;">'.$v['Integral_value'].'</div></div>';
echo '</span>';
echo '</span>';
echo '</a>';
echo '<div id="myModal'.$v['id'].'" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">';
echo '<div class="view-modal">';
echo '<div class="modal-content">';
echo '<div class="modal-header">';
echo '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>';
echo '<h4 class="modal-title" id="mySmallModalLabel">'.$v['Title'].'<a class="anchorjs-link" href="#mySmallModalLabel"><span class="anchorjs-icon"></span></a></h4>';
echo '</div>';
echo '<div class="modal-body">';
echo $v['Content'];
echo '</div>';
echo '<div class="modal-footer">';
echo '<div style="float:left; margin-top:8px;"><div style="float: left;"><img src="images/Dollar.png" width="20" /></div><div style="float: left;padding-top: 4px;">&nbsp;'.$v['Integral_value'].'</div></div>';
echo '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>';
echo '</div>';
echo '</div>';
echo '</div>';
echo '</div>';
echo '</div>';
}
?>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
