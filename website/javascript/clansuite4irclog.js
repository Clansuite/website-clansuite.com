$('html').addClass('js');
$(function() {

    // Hoveranimations
    $('#sidebar a.menu_button').hover(function() {
        $(this).stop().animate({ width: '100px', paddingLeft: '45px' }, 225);
    }, function() {
        if (!$(this).is('.selected')) {
            $(this).stop().animate({ width: '100px', paddingLeft: '12px' }, 225);
        }
    });
});