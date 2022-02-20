// // Import jQuery module (npm i jquery)
 import $ from 'jquery'
 window.jQuery = $
 window.$ = $
import slick from 'slick-carousel/slick/slick.min.js';


import Swiper from 'swiper/bundle';
//import Swiper, { Navigation, Pagination } from 'swiper';


//import WOW from 'wow.js/dist/wow.js';
// // Import vendor jQuery plugin example (not module)
//require('~/app/js/jquery.formstyler.min.js');
//require('~/app/js/jquery.validate.min.js');
//require('~/app/js/jquery.fancybox.min.js');
require('~/app/js/jquery.inputmask.bundle.js');


//    new WOW().init();
document.addEventListener('DOMContentLoaded', () => {
   /* $('.js-select-placeholder').select2({
        minimumResultsForSearch: -1,
        placeholder: "Выберите",
        allowClear: true
    });
*/

    $('.js-toggle').on('click', function(e) {
        e.preventDefault();
        $(this).toggleClass('is-active');
        $(this).parent('.box-dropdown__header').next('.box-dropdown__footer').slideToggle(function() {
            if($(this).is(":hidden")) {
                $(this).prev('.box-dropdown__header').find('.js-toggle').text('Дополнительные услуги:');
            }
            if($(this).is(":visible")) {
                $(this).prev('.box-dropdown__header').find('.js-toggle').text('Скрыть');
            }
        });
    });

    $('.js-togglePassword').on('click', function() {
        $('.myform__wrap .myform__input').each(function() {
            console.log($(this).attr('type'));
            if ($(this).attr('type') === 'password') {
                $(this).attr('type', 'text');
            } else {
                $(this).attr('type', 'password');
            }
        });

    });
    $('.js-slider-text').slick({
        arrows: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: false,
        prevArrow: $('#slider-text__prev'),
        nextArrow: $('#slider-text__next'),
//        infinite: true,
    });

    $('.js-popular-slider').slick({
        arrows: false,
        dots: true,
        slidesToShow: 4,
        slidesToScroll: 2,
        responsive: [
            {
                breakpoint: 991,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                }
            }
        ]
    });
    $('.js-tabs li').first().addClass('is-active');
    $('.tabContent__item').first().fadeIn(400);

    $('.tabs a').click(function(e) {
        e.preventDefault();
        $('.tabs__item').removeClass('is-active');
        $(this).parent().addClass('is-active');
        var tab = $(this).attr('href');
        $('.tabContent__item').not(tab).css({'display':'none'});
        $(tab).fadeIn(400);
    });
    $('.accordeon__item:first-child .accordeon__title').addClass('accordeon__title--active');
    $('.accordeon__item:first-child .accordeon__text').show();
    $('.accordeon__item:first-child .accordeon__icon').addClass('accordeon__icon--active');


    $('.js-accordeon').on('click', function() {
        $(this).toggleClass('accordeon__title--active');
        $(this).find('.accordeon__icon').toggleClass('accordeon__icon--active');
        $(this).next('.comparePage__accordeon-answer').slideToggle();
    });


    $('.js-accordeon2').on('click', function() {
        $(this).toggleClass('is-active');
        $(this).next('.accordeon-mobile__text').toggleClass('accordeon-mobile__text-show').slideToggle();
    });

    $('#js-slider-text-dots .slider-text__list-item').on('click', function() {
        let numberSlide = $(this).data('slide');
        $('#js-slider-text-dots .slider-text__list-item').removeClass('is-active');
        $(this).addClass('is-active');
        $('.js-slider-text').slick('slickGoTo', numberSlide);
    });

    $('.js-integrator-slider').slick({
        arrows: false,
        dots: true,
        slidesToShow: 4,
        slidesToScroll: 2,
        responsive: [
            {
                breakpoint: 991,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                }
            },
            {
                breakpoint: 370,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                }
            }
        ]
    });

    $('.js-screenshot-slider').slick({
        arrows: false,
        dots: true,
        slidesToShow: 4,
        slidesToScroll: 2,
        responsive: [
            {
                breakpoint: 991,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                }
            },
            {
                breakpoint: 440,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                }
            }
        ]
    });
    const swiper = new Swiper('.js-swiper', {
        // Optional parameters
        direction: 'horizontal',
        slidesPerView: 1,
        speed: 2000,
        loop: true,
        observer: true,
//        effect: 'fade',

        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },

        on: {

            slideChange: function() {
                if (this.activeIndex === 0) {
                    console.log(this.activeIndex);
                }
                if (this.activeIndex === 1 || this.activeIndex === 5) {
                    console.log(this.activeIndex);
                    $('.slider-btns__item').removeClass('active');
                    $('.slider-btns__item:nth-child(1)').toggleClass('active');
                }

                if (this.activeIndex === 2) {
                    console.log('2');
                    $('.slider-btns__item').removeClass('active');
                    $('.slider-btns__item:nth-child(2)').toggleClass('active');
                }

                if (this.activeIndex === 3) {
                    console.log('3');
                    $('.slider-btns__item').removeClass('active');
                    $('.slider-btns__item:nth-child(3)').toggleClass('active');
                }

                if (this.activeIndex === 4) {
                    console.log('4');
                    $('.slider-btns__item').removeClass('active');
                    $('.slider-btns__item:nth-child(4)').toggleClass('active');
                }
            }
        },

        // If we need pagination
        pagination: {
            clickable: true,
            el: '.slider-main .swiper-pagination',
        },

        // Navigation arrows
//        navigation: {
//            nextEl: '.swiper-button-next',
//            prevEl: '.swiper-button-prev',
//        },

        // And if we need scrollbar
//        scrollbar: {
//            el: '.swiper-scrollbar',
//        },
//        on: {
//            init: function () {
//                console.log('ololo')
//                let slides = document.querySelectorAll('.slider-btns__item');
//                slides[0].classList.add('active');
//            }
//        }
    });

//    swiper.on('init', function () {
//        console.log('ololo')
//        let slides = document.querySelectorAll('.slider-btns__item');
//        slides[0].classList.add('active');
//    });

//    swiper.on('slideChange', function () {
//        let id = swiper.activeIndex;
////        id = id - 1;
//        console.log(id);
//        let slides = document.querySelectorAll('.slider-btns__item');
//        //slides[id].classList.add('active');
////        document.querySelector('.slider-btns__item').classList.remove('active');
//    });
//
    let bullets = document.querySelectorAll('.slider-btns__item');

    bullets.forEach((btl) => {
        btl.addEventListener('click', ()=> {
            let slide = +btl.dataset.slide;
            swiper.slideTo(slide);
        })
    })

    $('.js-menuBtn').on('click', function(e) {
        e.preventDefault();
        $('#mobileMenu').slideToggle();
        $(this).toggleClass('active');
    });

    $('.js-title').on('click', function() {
        $(this).next('.js-hidden').slideToggle();
    });

    /* input mask
    ====================================*/
    $('.js-mask').inputmask("+1 (999) 999 99 99");


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
    $(".js-nav").on("click", function(e) {

        e.preventDefault();

        menu.removeClass('menu--active');
        $(pull).removeClass('on');
        var currentBlock = $(this).attr("href"),
            currentBlockOffset = $(currentBlock).offset().top;

        $("html, body").animate({
            scrollTop: currentBlockOffset
        }, 500);

    });



    /* accordeon
    ====================================*/
    $('.accordeon__text').hide();

//    $('.accordeon__item:first-child .accordeon__text').addClass('accordeon__item--active');
    $('.accordeon__item:first-child .accordeon__title').addClass('accordeon__title--active');
    $('.accordeon__item:first-child .accordeon__text').show();

//    $('.accordeon__item').addClass('accordeon__item--active');
//    $('.accordeon__item .accordeon__icon').addClass('accordeon__icon--active');
//    $('.accordeon__item .accordeon__text').show();

    $('.js-accordeon').on('click', function() {
//        $(this).find('.accordeon__icon').toggleClass('accordeon__icon--active');
        $(this).toggleClass('accordeon__title--active');

        $(this).next('.accordeon__text').slideToggle();
    });

    /*
    $('.js-more').on('click', function(e) {
        e.preventDefault();

        $('.js-hiddenShow').slideToggle();
    });
    */

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
    $('.button').click(function(){
        var buttonId = "two";
        $('#modal-container').removeAttr('class').addClass(buttonId);
        $('body').addClass('modal-active');
    })

    $('.modal-close').click(function(){
        $(this).addClass('out');
        $('body').removeClass('modal-active');
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


    /* slider
    ====================================*/
//    $('.js-sliderThree').slick({
////        adaptiveHeight: true,
//        arrows: true,
//        dots: false,
//        infinite: true,
//        slidesToShow: 3,
//        slidesToScroll: 3,
////        variableWidth: true,
//        responsive: [
//            {
//                breakpoint: 830,
//                settings: {
//                    slidesToShow: 2,
//                    slidesToScroll: 2,
//                }
//            },
//            {
//                breakpoint: 531,
//                settings: {
//                    slidesToShow: 1,
//                    slidesToScroll: 1,
//                }
//            },
//        ]
//    });
//
//
//    $('.js-sliderTwo').slick({
//        arrows: true,
//        dots: true,
//        infinite: true,
//        slidesToShow: 2,
//        slidesToScroll: 2,
//        responsive: [
//            {
//                breakpoint: 590,
//                settings: {
//                    arrows: false,
//                    slidesToShow: 1,
//                    slidesToScroll: 1,
//                }
//            },
//        ]
//    });


    /* catalog slider
    ====================================*/
//    $('.js-catalog-slider').slick({
//        arrows: true,
//        dots: false,
//        infinite: true,
//        slidesToShow: 1,
//        slidesToScroll: 1
//    });



    /* js-more
    ====================================*/
//    let more__txt = $('.hiddenBox .priceBox__descript'),
//        more__btn = $('.js-more');
//
//    $(more__txt).hide();
//
//    $(more__btn).on('click', function(e) {
//        e.preventDefault();
//        $(more__txt).slideToggle(function() {
//            if($(this).is(':hidden')) {
//                $(more__btn).text('Показать все новости');
//            }
//            if($(this).is(":visible")) {
//                $(more__btn).text('Скрыть все новости');
//            }
//        });
//    });

    /* tab
    ====================================*/
//    $('.js-tabs li').first().addClass('tabs__item-active');
//    $('.tabContent__item').first().fadeIn(400);
//
//    $('.tabs a').click(function(e) {
//        e.preventDefault();
//        $('.tabs__item').removeClass('tabs__item-active');
//        $(this).parent().addClass('tabs__item-active');
//        var tab = $(this).attr('href');
//        $('.tabContent__item').not(tab).css({'display':'none'});
//        $(tab).fadeIn(400);
//    });

    /* calc
    ====================================*/

//    let js_plus = $('.js-plus'),
//        js_minus = $('.js-minus'),
//        resultSumm = $('#resultSumm'),
//        resultPrice = 0,
//        resultPrice2 = 0;
//
//    let resultPlus = $(js_plus).on('click', function() {
//        let this_input = $(this).prev('.js-input-num');
//        let inputValue = $(this_input).val();
//        inputValue++;
//        $(this_input).val(inputValue);
//        checkInput();
//    });
//
//    let resultMinus = $(js_minus).on('click', function() {
//        let this_input = $(this).next('.js-input-num');
//        let inputValue = $(this_input).val();
//        if(inputValue <= 0) return false;
//        inputValue--;
//        $(this_input).val(inputValue);
//        checkInput();
//
//    });
//
//    function checkInput() {
//        let startCount = 0;
//        $('.js-start-table tbody tr').each(function() {
//            let thisPrice = $(this).find('.js-priceProduct').data('price');
//            //console.log(thisPrice);
//            let thisCount = $(this).find('.js-input-num').val();
//            //console.log(thisCount);
//            let priceTr = thisPrice * thisCount;
//            startCount += priceTr;
//            // console.log(startCount);
//            // console.log(thisCount);
//            $(resultSumm).text(startCount);
//        });
//    }


})
