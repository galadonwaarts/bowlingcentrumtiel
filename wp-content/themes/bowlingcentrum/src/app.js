import $ from "jquery";
globalThis.jQuery = $;

// GENERAL STYLING
import './styles.scss';

// FONT AWESOME
// import { library, dom } from '@fortawesome/fontawesome-svg-core';
// import faUser from '@fortawesome/pro-solid-svg-icons/faUser';
// import faChevronDown from '@fortawesome/pro-regular-svg-icons/faChevronDown';
// import faChevronRight from '@fortawesome/pro-regular-svg-icons/faChevronRight';
//
// library.add(faUser, faChevronDown, faChevronRight);
// dom.watch();

// SLICK SLIDER
// import 'slick-carousel';
// import 'slick-carousel/slick/slick.scss';


// AOS
// import AOS from 'aos';
// import 'aos/dist/aos.css';


(function ($) {

  $(function () {

    'use strict';

    // DOM ready, take it away

    // MOBILE MENU submenu
    $('<div class="subarrow"><i class="fa-regular fa-chevron-down"></i></div>').insertAfter('.mobile-menu li.menu-item-has-children > a');
    $('.mobile-menu .subarrow').on('click', function () {
      if ($(this).parent().hasClass('active')) {
        $(this).parent().removeClass('active');
      } else {
        $(this).parent().addClass('active');
      }
    });

    $('header li.menu-item-has-children > a').append('<div class="subarrow"><i class="fa-solid fa-chevron-right"></i></div>');


    // MOBILE TOGGLE
    // ===============================================

    $('.menu-toggle').on('click', function () {
      if ($('.mobile-menu').hasClass('active')) {
        $('.mobile-menu, .page-overlay').removeClass('active');
        $('body').removeClass('overflow-hidden');
      } else {
        $('.mobile-menu, .page-overlay').addClass('active');
        $('body').addClass('overflow-hidden');
      }
    });
    $('.page-overlay').on('click', function () {
      $('.mobile-menu, .page-overlay').removeClass('active');
      $('body').removeClass('overflow-hidden');
    });

    $('.mobile-menu ul li a, .header .logo').on('click', function () {
      $('body').removeClass('overflow-hidden');
    });

    // Close mobile menu on click
    $(document).click(function (event) {
      var $target = $(event.target);
      if (!$target.closest('.mobile-menu').length && !$target.closest('.menu-toggle').length && $('.mobile-menu').hasClass('active')) {
        $('.mobile-menu').removeClass('active');
        $('body').removeClass('overflow-hidden');
      }

    });


    // Scrollbar calc for tailwind breakout
    // ===============================================
    $('html').css('--twcb-scrollbar-width', (window.innerWidth - $('html').width()) + "px");

    // HEADER SCROLLED
    // ===============================================
    $(window).scroll(function () {
      var scroll = $(window).scrollTop();
      if (scroll >= 150) {
        $("header, body").addClass("scrolled");
      }

      if (scroll < 50) {
        $("header, body").removeClass("scrolled");
      }
    });


    // AOS.init({
    //   duration: 400,
    //   offset: 0, // offset (in px) from the original trigger point
    //   once: true, // whether animation should happen only once - while scrolling down
    //   anchorPlacement: 'top-bottom', // define where the AOS animations will be triggered
    // });
    // window.addEventListener('load', AOS.refresh);


  });

})(jQuery);