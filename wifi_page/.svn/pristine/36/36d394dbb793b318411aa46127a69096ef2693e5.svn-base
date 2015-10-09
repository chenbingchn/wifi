$(function(){
    $('.nav li').not('.cur').on('click',function(){
        var navLine = $('.nav-line'),
            w =$(this).width(),
            left  = $(this).position().left;
        navLine.animate({'width':w,'left':left},100);
    });
    $('.close-btn').on('touchend', function(e) {
        e.stopImmediatePropagation();
        $('.banners').hide();
    });
});