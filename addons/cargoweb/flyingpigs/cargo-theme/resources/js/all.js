var Project = {};

Project.init = function () {

};

$(document).on("ready", function () {
  Project.init();
});

$(window).on("load", function () {
  $('.btn-menu-mobile').on('click', function (ev) {
    if (!$('.menu-mobile').is('.open')) {
      $('.menu-mobile').addClass('open');
    }
  });

  $('.menu-mobile .btn-close,.menu-mobile .close-menu').on('click', function (ev) {
    if ($('.menu-mobile').is('.open')) {
      $('.menu-mobile').removeClass('open');
    }
  });

  $('.dropdown .btn-dropdown .icon').on('click', function (ev) {
    ev.preventDefault();
    $(this).closest('.dropdown').toggleClass('open');
  });

  $('[data-scroll]').on('click', function (ev) {

    ev.preventDefault();
    var headerOffset = $('header.header').height();
    var target = $($(this).data('scroll'));
    var offsetTop = parseInt($($(this).data('offsettop'))[0]) > 0 ? parseInt($($(this).data('offsettop'))[0]) : 0;

    var distance = target.offset().top - headerOffset - offsetTop;

    $('html, body').animate({
      scrollTop: distance + 1
    }, 1000, function () {});

  });

  $('[data-modal-open]').on('click', function () {
    var modalSelector = $(this).data('modal-open');
    $('body').addClass('modal-open');
    $('[data-modal=' + modalSelector + ']').addClass('modal-open');
  });

  $('[data-modal-close]').on('click', function (ev) {
    if (this === ev.target) {
      $('body').removeClass('modal-open');
      $('[data-modal]').removeClass('modal-open');
    }
  });

  $(document).on('click', '[data-dismiss]', function (ev) {
    var selector = $(this).attr('data-dismiss');
    $(this).closest("." + selector).hide();
  });

});

$(window).on("resize", function () {

});

$(window).on("scroll", function () {
  var scrollY = $(this).scrollTop();

  var header = $('.header');
  var headerOffset = 0;
  if (scrollY > headerOffset && !header.hasClass('header--sticky')) {
    header.addClass('header--sticky');
  }
  else if (scrollY <= headerOffset && header.hasClass('header--sticky')) {
    header.removeClass('header--sticky');
  }
});
$(function(){
    $(".js-accept-cookies").on("click", function () {
        $('.js-cookie-consent-block').fadeOut();
        Cookies.set("userCookieConsent", 1, {expires: 365, path: "/"});
    });

    if( !Cookies.get("userCookieConsent") ){
        $('.js-cookie-consent-block').fadeIn();
    }
});