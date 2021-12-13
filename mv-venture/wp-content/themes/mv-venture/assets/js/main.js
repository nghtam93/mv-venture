$(document).ready(function(){

    /*----Get Header Stick ---*/
    var header_sticky=$("header.-fix")
    $(window).scroll(function(){
        $(this).scrollTop()>5?header_sticky.addClass("is-active"):header_sticky.removeClass("is-active")
    })

    $( window ).on( "load", function() {
        (header_sticky.offset().top >5) ? header_sticky.addClass("is-active"):header_sticky.removeClass("is-active")
    });


    /*----Get Header Height ---*/
    function get_header_height() {
        var header_sticky=$("header.-fix").outerHeight()
        $('body').css("--header-height",header_sticky+'px')
    }

    setTimeout(function(){
        get_header_height()
    }, 500);

    $( window ).resize(function() {
      get_header_height()
    });

    // Click id a
    var jump=function(e)
    {
        console.log(111)
        $(document).off("scroll");
        if (e){
           e.preventDefault();
           var target = $(this).attr("href");
        }else{
           var target = location.hash;
        }

        $('html, body').stop().animate({
            'scrollTop': $(target).offset().top
        });

        location.hash = target;
    }

    $('a[href^="#"]').bind("click", jump);

    if (location.hash){
        setTimeout(function(){
            $('html, body').scrollTop(0).show();
            jump();

        }, 0);
    }else{
        $('html, body').show();
    }


    $(document).on('click', 'a[href^="#"], a[href*=".html#"]', function (e) {

        $(this).closest('nav').find('li').removeClass('active')
        $(this).closest('li').addClass('active')

        //Close menu mb
        $('.menu-mb__btn').removeClass('active')
        $('.nav__mobile').removeClass('active')
        $('body').removeClass('menumb-open')
    });



    //-------------------------------------------------
    // Menu
    //-------------------------------------------------
    $('.nav__mobile--close').click(function(e){
        $('.nav__mobile').removeClass('active')
        $('body').removeClass('menumb-open')
    });
    $('.menu-mb__btn').click(function(e){
        e.preventDefault()
        if($('body').hasClass('menumb-open')){
            $('.menu-mb__btn').removeClass('active')
            $('.nav__mobile').removeClass('active')
            $('body').removeClass('menumb-open')
        }else{
            $('.menu-mb__btn').addClass('active')
            $('body').addClass('menumb-open')
            $('.nav__mobile').addClass('active')
        }
    });

    //back to top
    var back_to_top=$(".back-to-top"),offset=220,duration=500;
    $(document).on("click",".back-to-top",function(o){
        return o.preventDefault(),$("html, body").animate({scrollTop:0},duration),!1
    });

    $('button[data-bs-toggle="tab"]').on('shown.bs.tab', function (e) {
      $('.js-slick').slick('setPosition');
    })

    //check home
    if($('body').hasClass( "home" )){

        new WOW().init();

        // Loadmore
        $('.js-btn-loadmore').on("click",function(e) {
            var loadmore_content = $(this).closest('.js-loadmore__wrap').find('.js-content-loadmore')
            if(loadmore_content.hasClass('active')){
                loadmore_content.removeClass('active')
            }else{
                loadmore_content.addClass('active')
            }
            $(this).remove()
        })

        $('.news__slider').slick({
            infinite: false,
            slidesToShow: 4,
            slidesToScroll: 1,
            dots: false,
            easing: "linear",
            prevArrow: '<span class="icon-arrow-left slick-prev slick-arrow"></span>',
            nextArrow: '<span class="icon-arrow-right slick-next slick-arrow"></span>',
            responsive: [
                {
                  breakpoint: 991,
                  settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    dots: false,
                    arrows: true
                  }
                },
                {
                  breakpoint: 767,
                  settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    dots: false,
                    arrows: true
                  }
                },
                {
                  breakpoint: 575,
                  settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    dots: false,
                    arrows: true
                  }
                }
            ]
        });
    }
    if($('body').hasClass( "single" )){
        var single_share = $('.single__share')
        var share_offset = $('.single__share').offset().top

        $(window).scroll(function(){
            $(this).scrollTop()>share_offset?single_share.addClass("is-active"):single_share.removeClass("is-active")
        })

        Fancybox.bind("a[href$='.jpg'], a[href$='.png'], a[href$='.jpeg'], a[href$='.gif']", {
          groupAttr: false,
        });
    }




});


