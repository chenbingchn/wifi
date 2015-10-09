$(document).ready(function() {
    var maxNum=0;
    $(document).scroll(function(){
        var webheight=$(window).height();
        var wordheight=$(document).height();
        var scrollTop=$(window).scrollTop();
        var now=scrollTop/(wordheight-webheight);

        var minNum=parseInt($(".key",this).eq(0).html());
        $(".key",this).each(function() {
            var num = parseInt(this.innerHTML);
            if(num<minNum)
            {
                minNum=num;
            }
        });

        if(now == 1){
            $.ajax({
                type:'get',
                async:'false',
                url:'show',
                data: 'id='+minNum,
                dataType:"json",
                success:function(show){
                    $.each(show, function(index, value){
                        $('#div1').append(
                            '<div class="row" align="center">' +
                                '<div id="show"> ' +
                                    '<div class="key">'+ value.id + '</div> ' +
                                    '<div class="images"> ' +
                                    '   <img src=" '+ value.name + '" class="img" /> ' +
                                    '</div> ' +
                                '</div> ' +
                            '<div class="clear">&nbsp;</div>' +
                            '</div>'
                        );
                    })
                }
            });
        }
    });
});
