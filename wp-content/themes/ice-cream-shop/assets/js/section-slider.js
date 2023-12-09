jQuery(function($){
    $('#featureproduct-section .owl-carousel').owlCarousel({
        refreshClass: 'owl-refresh',
        autoplayTimeout:5000,
        loop: true,
        margin: 30,
        autoHeight: true,
        autoWidth: false,
        autoplay: true,
        responsiveClass: true,
        responsive: {
          0: {
            items: 1,
            nav: true,
            margin: 10
          },
          400: {
            items: 2,
            nav: true,
            margin: 15
          },
          600: {
            items:3,
            nav: true,
            margin: 15
          },
          1000: {
            items:4,
            nav: true,
            loop: true,
            margin: 15
          }
        }
      })  
});
