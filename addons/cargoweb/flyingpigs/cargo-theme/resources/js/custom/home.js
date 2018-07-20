$(document).ready(function(){
  if ( $('.slider-hero').length > 0 ) {
    var sliderHero = new Swiper('.slider-hero .swiper-container', {
      spaceBetween: 100,
      breakpoints: {
        767: {
          pagination: {
            el: '.swiper-pagination',
            type: 'bullets',
          },
        }
      },
      on: {
        slideChange : function() {
          var activeItem = sliderHero.activeIndex;
          $('.slider-hero__navigation__item.active').removeClass('active');
          $('.slider-hero__navigation__item[data-slide="' + activeItem + '"]').addClass('active');
        }
      }
    });

    $('.slider-hero__navigation__item').on('click', function(ev){
      ev.preventDefault();
      var slide = parseInt($(this).data('slide'));
      sliderHero.slideTo(slide);
    });


    $('.slider-hero .btn-down').on('click', function() {

    });
  }

  if ( $('.slider-home').length > 0 ) {
    var sliderHome = new Swiper('.slider-home .swiper-container', {
      spaceBetween: 10,
      slidesPerView: 3,
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev'
      },
      breakpoints: {
        767: {
          slidesPerView: 1.3
        }
      },
    });

  }

  if ( $('.map__list__slider').length > 0 ) {
    if ( !$('.map').is('.contact-page') ) {

      var sliderHome = new Swiper('.map__list__slider .swiper-container', {
        spaceBetween: 60,
        slidesPerView: 4,
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev'
        },
        breakpoints: {
          1024: {
            slidesPerView: 3
          },
          767: {
            slidesPerView: 1,
            autoHeight: true
          }
        },
      });
    }
  }
});