// // Import jQuery module (npm i jquery)
 import $ from 'jquery'
 window.jQuery = $
 window.$ = $
//import slick from 'slick-carousel/slick/slick.min.js';


import Swiper from 'swiper/bundle';
//import Swiper, { Navigation, Pagination } from 'swiper';

// import ionRangeSlider from 'ion-rangeslider';


//import WOW from 'wow.js/dist/wow.js';
// // Import vendor jQuery plugin example (not module)
//require('~/app/js/jquery.formstyler.min.js');
//require('~/app/js/jquery.validate.min.js');
//require('~/app/js/jquery.fancybox.min.js');
//require('~/app/js/jquery.inputmask.bundle.js');


//    new WOW().init();
document.addEventListener('DOMContentLoaded', () => {

    const swiper = new Swiper('.js-swiper', {
        // Optional parameters
        direction: 'horizontal',
        slidesPerView: 1,
        speed: 2000,
        loop: true,
        observer: true,
        autoplay: {
            delay: 4000,
        },

        pagination: {
            clickable: true,
            el: '.slider-main .swiper-pagination',
        },

        // Navigation arrows
        navigation: {
            nextEl: '.slider-main .swiper-button-next',
            prevEl: '.slider-main .swiper-button-prev',
        },
//        effect: 'fade',

        on: {

            slideChange: function() {
                if (this.activeIndex === 0) {
                    console.log(this.activeIndex);
                }
                if (this.activeIndex === 1 || this.activeIndex === 5) {
                    //console.log(this.activeIndex);
                    $('.slider-btns__item').removeClass('active');
                    $('.slider-btns__item:nth-child(1)').toggleClass('active');
                }

                if (this.activeIndex === 2) {
                    //console.log('2');
                    $('.slider-btns__item').removeClass('active');
                    $('.slider-btns__item:nth-child(2)').toggleClass('active');
                }

                if (this.activeIndex === 3) {
                    //console.log('3');
                    $('.slider-btns__item').removeClass('active');
                    $('.slider-btns__item:nth-child(3)').toggleClass('active');
                }

                if (this.activeIndex === 4) {
                    //console.log('4');
                    $('.slider-btns__item').removeClass('active');
                    $('.slider-btns__item:nth-child(4)').toggleClass('active');
                }
            }
        },



        // If we need pagination

    });

    const swiperSliderText = new Swiper('.js-slider-main-text', {
        // Optional parameters
        direction: 'horizontal',
        slidesPerView: 1,
        speed: 2000,
        loop: true,

        autoplay: {
            delay: 4000,
        },

        pagination: {
            clickable: true,
            el: '.slider-main .swiper-pagination',
        },

    });



    let bullets = document.querySelectorAll('.slider-btns__item');

    bullets.forEach((btl) => {
        btl.addEventListener('click', ()=> {
            let slide = +btl.dataset.slide;
            swiperSliderText.slideTo(slide);
        })
    })

    swiperSliderText.controller.control = swiper;

    $('.js-menuBtn').on('click', function(e) {
        e.preventDefault();
        $('#mobileMenu').slideToggle();
        $(this).toggleClass('active');
    });

    $('.js-title').on('click', function() {
        $(this).next('.js-hidden').slideToggle();
    });


    /* range-slider
    ====================================*/
    /*var $range = $(".js-range-slider"),
        $from = $(".js-from"),
        $to = $(".js-to"),
        range,
        min = 1,
        max = 30,
        from,
        to;

    var updateValues = function () {
        $from.prop("value", from);
        $to.prop("value", to);
    };

    $range.ionRangeSlider({
        type: "double",
        min: min,
        max: max,
        hide_min_max:true,
        prettify_enabled: false,
        postfix: '<span class="rouble">i</span>',
        grid: false,
        grid_num: 10,
        onChange: function (data) {
            from = data.from;
            to = data.to;

            updateValues();
        }
    });

    range = $range.data("ionRangeSlider");

    var updateRange = function () {
        range.update({
            from: from,
            to: to
        });
    };

    $from.on("change", function () {
        from = +$(this).prop("value");
        if (from < min) {
            from = min;
        }
        if (from > to) {
            from = to;
        }

        updateValues();
        updateRange();
    });

    $to.on("change", function () {
        to = +$(this).prop("value");
        if (to > max) {
            to = max;
        }
        if (to < from) {
            to = from;
        }

        updateValues();
        updateRange();
    });*/

    /* input mask
    ====================================*/
    //$('.js-mask').inputmask("+1 (999) 999 99 99");

    /* js-toggle
    ====================================*/
    $('.js-toggle').on('click', function(e) {
        e.preventDefault();
        $(this).toggleClass('is-active');
        $(this).parent('.box-dropdown__header').next('.box-dropdown__footer').slideToggle(function() {
            if($(this).is(":hidden")) {
                $(this).prev('.box-dropdown__header').find('.js-toggle').text('Показать');
            }
            if($(this).is(":visible")) {
                $(this).prev('.box-dropdown__header').find('.js-toggle').text('Скрыть');
            }
        });
    });

    /* Menu
    ====================================*/


    let pull         = $('#pull'),
        menu         = $('.js-menu'),
        overlay      = $('.js-overlay');

    $(pull).on('click', function() {
        $(this).toggleClass('on');
        menu.toggleClass('menu--active');
        return false;
    });

    /* fixed header
    ====================================*/
    $(window).on('scroll', function(){
        let sc = $(this).scrollTop();

        if ($('.product-page').length > 0) {
            if(sc >= $('.product-page').offset().top) {
                $('#fixedMenu').addClass('is-fixed');
            } else {
                $('#fixedMenu').removeClass('is-fixed');
            }
        }

    });


    $('.js-toggleClass').on('click', function(e) {
        e.preventDefault();
        $(this).next('.fixedMenu__list').toggleClass('is-active');
    });

    /* accordeon
    ====================================*/
    $('.comparePage__accordeon-answer').hide();
    $('.js-accordeon').on('click', function() {
        $(this).toggleClass('accordeon__title--active');
        $(this).find('.accordeon__icon').toggleClass('accordeon__icon--active');
        $(this).next('.comparePage__accordeon-answer').slideToggle();
    });

    /* Modals
    ====================================*/
    $(document).keydown(function(e) {
        if (e.keyCode == 27) {
            $(".js-overlay, .js-popup").fadeOut(300);
//            $(menu).removeClass('menu--active');
        }
    });

    $('.js-btn').on('click', function(e){
        e.preventDefault();
        var id = $(this).attr('data-link');
        $('#' + id).fadeIn(500);
        $('.js-overlay').fadeIn(500);
        return false;

    });

    $(".js-overlay").on("click", function() {
        $(".js-popup, .js-overlay").fadeOut();
    });

    $('.js-close').on('click', function() {
        $(".js-popup, .js-overlay").fadeOut();
    });

//    $('.js-politics').on('click', function(e) {
//        e.preventDefault();
//        $('.js-popup').fadeOut();
//        $('#politics, .js-overlay').fadeIn(500);
//    });




})
