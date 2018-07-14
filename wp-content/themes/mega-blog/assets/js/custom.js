jQuery(document).ready(function($) {

/*------------------------------------------------
            DECLARATIONS
------------------------------------------------*/

    var loader = $('#loader');
    var loader_container = $('#preloader');
    var scroll = $(window).scrollTop();  
    var scrollup = $('.backtotop');
    var menu_toggle = $('.menu-toggle');
    var dropdown_toggle = $('.main-navigation button.dropdown-toggle');
    var nav_menu = $('.main-navigation ul.nav-menu');
    var gallery_post_slider = $('.gallery-post-slider');
    var related_gallery_slider = $('.related-gallery-slider');
    var widget_post_slider = $('.widget_post_slider');

/*------------------------------------------------
            PRELOADER
------------------------------------------------*/

    loader_container.delay(1000).fadeOut();
    loader.delay(1000).fadeOut("slow");

/*------------------------------------------------
                BACK TO TOP
------------------------------------------------*/

    $(window).scroll(function() {
        if ($(this).scrollTop() > 1) {
            scrollup.css({bottom:"25px"});
        } 
        else {
            scrollup.css({bottom:"-100px"});
        }
    });

    scrollup.click(function() {
        $('html, body').animate({scrollTop: '0px'}, 800);
        return false;
    });

/*------------------------------------------------
                MENU, STICKY MENU AND SEARCH
------------------------------------------------*/

    $('#top-menu').click(function(){
        $('#top-menu .wrapper').slideToggle();
        $('#top-menu').toggleClass('top-menu-active');
    });

    menu_toggle.click(function(){
        nav_menu.slideToggle();
       $('.main-navigation').toggleClass('menu-open');
    });

    dropdown_toggle.click(function() {
        $(this).toggleClass('active');
       $(this).parent().find('.sub-menu').first().slideToggle();
    });

    $(window).scroll(function() {
        if ($(this).scrollTop() > 290) {
            $('.site-header.sticky-header').fadeIn();
            if ($('.site-header').hasClass('sticky-header')) {
                $('.site-header.sticky-header').addClass('nav-shrink');
                $('.site-header.sticky-header').fadeIn();
            }
        } 
        else {
            $('.site-header.sticky-header').removeClass('nav-shrink');
        }
    });

    $('.main-navigation ul li a.search').click(function(event) {
        event.preventDefault();
        $(this).toggleClass('search-open');
        $('.main-navigation #search').toggle();
        $('.main-navigation .search-field').focus();
        $('body').addClass('search-open');
    });

    $(document).keyup(function(e) {
        if (e.keyCode === 27) {
            $('.main-navigation .search').removeClass('search-open');
            $('.main-navigation #search').hide();
            $('body').removeClass('search-open');
        }
    });

    $(document).click(function (e) {
      var container = $("#masthead");
       if (!container.is(e.target) && container.has(e.target).length === 0) {
            $('.main-navigation .search').removeClass('search-open');
            $('.main-navigation #search').hide();
            $('body').removeClass('search-open');
        }
    });

/*------------------------------------------------
                SLICK SLIDERS
------------------------------------------------*/

gallery_post_slider.slick();
widget_post_slider.slick();

var status = $('.pagingInfo');

    related_gallery_slider.on('init reInit afterChange', function (event, slick, currentSlide, nextSlide) {
        var i = (currentSlide ? currentSlide : 0) + 1;
        status.text(i + '/' + slick.slideCount);
    });

    related_gallery_slider.slick({
        responsive: [
            {
                breakpoint: 550,
                settings: {
                    slidesToShow: 1
                }
            }
        ]
    });


/*------------------------------------------------
                END JQUERY
------------------------------------------------*/

});