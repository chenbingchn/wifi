$(function() {
    $('.time').each(function () {
        var n = parseInt($(this).text()) * 1000;
        $(this).text( new Date(n).toLocaleString());
    });
});