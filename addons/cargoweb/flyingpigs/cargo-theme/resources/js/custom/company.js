$(document).ready(function(){

  if ( $('.content-slider').length > 0 ) {
    var sliderHome = new Swiper('.content-slider .swiper-container', {
      spaceBetween: 10,
      slidesPerView: 2,
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev'
      },
      breakpoints: {
        990: {
          slidesPerView: 3
        },
        767: {
          slidesPerView: 1.3
        }
      },
    });

  }

  if ( $('.company-menu').length > 0 ) {
    $(window).on("scroll", function() {
      var scrollY = $(this).scrollTop();


      var submenu = $('.company-menu');
      if (submenu.length) {
        var submenuOffset = (submenu.offset().top - 100);
        if (scrollY > submenuOffset && !submenu.hasClass('company-menu--sticky')) {
          submenu.addClass('company-menu--sticky');
        }
        else if(scrollY <= submenuOffset && submenu.hasClass('company-menu--sticky')) {
          submenu.removeClass('company-menu--sticky');
        }
      }
    });


    var $links = $('.company-menu__item');

    var $blocks = [];
    $links.each(function(){
      var $this = $(this);
      var $block = $($this.attr('data-scroll'));
      $blocks.push($block);
    });

    $(window).on('scroll', function(){
      var scroll = $(window).scrollTop();
      var windowHeight = $(window).height();
      for (var i = 0; i < $blocks.length; i++){
        var offsetBlock = $blocks[i].offset().top;
        if ( offsetBlock < (scroll + (0.5 * windowHeight)) && offsetBlock - scroll > 0) {
          $links.removeClass('active');
          $links.filter('[data-scroll="#'+ $blocks[i].attr('id') +'"]').addClass('active');
        }
      }
    });
  }

});