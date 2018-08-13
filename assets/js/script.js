$(function (){

    $('.tabitem').on('click', function(){
        $('.activetab').removeClass('activetab');
        $(this).addClass('activetab');

        var item = $('.activetab').index();
        $('.tabbody').hide();
        $('.tabody').eq(item).show();
    });


});