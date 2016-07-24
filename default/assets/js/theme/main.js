jQuery(function($) {

    function menuToggle() {
        var windowWidth = $(window).width();
        if (windowWidth > 767) {
        	$('.main-nav').removeClass('fixed-menu animated slideInDown');
            $(window).on('scroll', function() {
                if ($(window).scrollTop() > 255) {
                    $('.main-nav').addClass('fixed-menu animated slideInDown');
                } else {
                    $('.main-nav').removeClass('fixed-menu animated slideInDown');
                }
            });
        } else {
        	$(window).off('scroll');
            $('.main-nav').addClass('fixed-menu animated slideInDown');
        }
    }
    menuToggle();
    $('#event-carousel, #tour-place-item').carousel({
        interval: false
    });
    
    $(window).resize(function() {
        menuToggle();
    });    
});