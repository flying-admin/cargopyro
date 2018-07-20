$(document).ready(function(){

  if ( $('.news-slider').length > 0 ) {
    var sliderHome = new Swiper('.news-slider .swiper-container', {
      spaceBetween: 20,
      slidesPerView: 1.4,
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev'
      },
      // breakpoints: {
      //   990: {
      //     slidesPerView: 3
      //   },
      //   767: {
      //     slidesPerView: 1.3
      //   }
      // },
    });

  }

});