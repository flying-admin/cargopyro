var Project = {};

Project.init = function(){
  
};

$(document).on("ready", function(){
  Project.init();
});

$(window).on("load", function(){
  $('.btn-menu-mobile').on('click', function(ev) {
    if( !$('.menu-mobile').is('.open') ) {
      $('.menu-mobile').addClass('open');
    }
  });

  $('.menu-mobile .btn-close').on('click', function(ev) {
    if( $('.menu-mobile').is('.open') ) {
      $('.menu-mobile').removeClass('open');
    }
  });

  $('.dropdown .btn-dropdown .icon').on('click', function(ev) {
    ev.preventDefault();
    $(this).closest('.dropdown').toggleClass('open');
  });

  $('[data-scroll]').on('click', function(ev) {

      ev.preventDefault();
      var headerOffset = $('header.header').height();
      var target = $($(this).data('scroll'));
      var offsetTop = parseInt($($(this).data('offsettop'))[0]) > 0 ? parseInt($($(this).data('offsettop'))[0]) : 0;

      var distance = target.offset().top - headerOffset - offsetTop;

      $('html, body').animate({
          scrollTop: distance + 1
      }, 1000, function(){
        
      });

  });
});

$(window).on("resize", function(){
 
});

$(window).on("scroll", function(){
  var scrollY = $(this).scrollTop();

  var header = $('.header');
  var headerOffset = 0;
  if (scrollY > headerOffset && !header.hasClass('header--sticky')){
    header.addClass('header--sticky');
  }
  else if(scrollY <= headerOffset && header.hasClass('header--sticky')) {
    header.removeClass('header--sticky');
  }
});
