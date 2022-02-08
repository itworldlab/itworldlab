// // Import jQuery module (npm i jquery)
import $ from 'jquery'
window.jQuery = $
window.$ = $
import slick from 'slick-carousel/slick/slick.min.js';


//import Swiper from 'swiper/bundle';


//import WOW from 'wow.js/dist/wow.js';
// // Import vendor jQuery plugin example (not module)
//require('~/app/js/jquery.formstyler.min.js');
//require('~/app/js/jquery.validate.min.js');
require('~/app/js/jquery.fancybox.min.js');
require('~/app/js/select2.min.js');
//require('~/app/js/jquery.inputmask.bundle.js');


//    new WOW().init(); 
document.addEventListener('DOMContentLoaded', () => {
    
    
//    $('.js-select').select2({
//        minimumResultsForSearch: -1
//    });
    
    $('.js-select-placeholder').select2({
        minimumResultsForSearch: -1,
        placeholder: "Выберите",
        allowClear: true
    });
    
    
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
    

	// Custom JS
    
    
    /* input mask 
    ====================================*/
//    $('.js-mask').inputmask("+1 (999) 999 99 99");
    
  
    /* Menu
    ====================================*/   
/*
    
    let pull         = $('#pull'),
        menu         = $('.js-menu'),
        overlay      = $('.js-overlay');

    $(pull).on('click', function() {
        $(this).toggleClass('on');
        menu.toggleClass('mobileMenu--active');
        return false;
    });
    $(".js-nav").on("click", function(e) {

        e.preventDefault();
        
        menu.removeClass('mobileMenu--active');
        $(pull).removeClass('on');
        var currentBlock = $(this).attr("href"),
            currentBlockOffset = $(currentBlock).offset().top;

        $("html, body").animate({
            scrollTop: currentBlockOffset
        }, 500);

    });
    
*/
    
    $('.js-menuBtn').on('click', function(e) {
        e.preventDefault();
        $('#mobileMenu').slideToggle();
        $(this).toggleClass('active');
        $('body').toggleClass('hiddenScroll');
    });
   
    $('.js-title').on('click', function() {
        $(this).next('.js-hidden').slideToggle();
    });
    
    
    
    /* Modals
    ====================================*/    
    /*
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
    
   */
   
    

    

    
    /* tab
    ====================================*/  
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
    
    /* accordeon
    ====================================*/
    $('.comparePage__accordeon-answer').hide();

    //    $('.accordeon__item:first-child .accordeon__text').addClass('accordeon__item--active');
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
    
})
