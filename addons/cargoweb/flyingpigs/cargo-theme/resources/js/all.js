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

   // Detect IE version
   var iev=0;
   var ieold = (/MSIE (\d+\.\d+);/.test(navigator.userAgent));
   var trident = !!navigator.userAgent.match(/Trident\/7.0/);
   var rv=navigator.userAgent.indexOf("rv:11.0");

   if (ieold) iev=new Number(RegExp.$1);
   if (navigator.appVersion.indexOf("MSIE 10") != -1) iev=10;
   if (trident&&rv!=-1) iev=11;

   // Firefox or IE 11
   if(typeof InstallTrigger !== 'undefined' || iev == 11) {
       var lastScrollTop = 0;
       $(window).on('scroll', function() {
           st = $(this).scrollTop();
           if(st < lastScrollTop) {
             $('.shrink-on-scroll').addClass('big-padding');
          }
          else if(st > lastScrollTop) {
            $('.shrink-on-scroll').removeClass('big-padding');
           }
           lastScrollTop = st;
       });
   }
   // Other browsers
   else {
       $('body').on('mousewheel', function(e){
           if(e.originalEvent.wheelDelta > 0) {
             $('.shrink-on-scroll').addClass('big-padding');
          }
          else if(e.originalEvent.wheelDelta < 0) {
            $('.shrink-on-scroll').removeClass('big-padding');
           }
       });
   }

   var hash = window.location.hash;
   if(hash){
    var headerOffset = $('header.header').height()+ 100;
    var target = $(hash);
    var offsetTop = parseInt($($(this).data('offsettop'))[0]) > 0 ? parseInt($($(this).data('offsettop'))[0]) : 0;

    var distance = target.offset().top - headerOffset - offsetTop;
      $('html, body').animate({
        scrollTop: distance + 1
      }, 1000, function () {});
   }
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
