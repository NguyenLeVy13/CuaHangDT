(function($) {
  'use strict';

    $( document ).ready(function() {
		if ( $('.slider-wrapper').hasClass("section-18") ) {
            var section18 = tns({
                container: '.main-slider',
                ltr: $("html").attr("dir") == 'ltr' ? true : false,
                items: 1,
                controlsContainer: "#customize-controls",
                navContainer: "#customize-thumbnails",
                navAsThumbnails: true,
                loop: true,
                mouseDrag: true,
                rewind: false,
                swipeAngle: false,
                autoHeight: true,
                lazyload: true,
                lazyloadSelector: ".tns-lazy",
                speed: 1000,
                autoplay: true,
                autoplayButtonOutput: false,
                autoplayTimeout: 9000,
            });
        }
		
		if ( $('.lifestyle-section').length > 0 ) {
            var section04 = tns({
                container: '.lifestyle-slider',
                ltr: $("html").attr("dir") == 'ltr' ? true : false,
                items: 1,
                loop: true,
                nav: false,
                controlsText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
                mouseDrag: true,
                rewind: false,
                swipeAngle: false,
                autoHeight: true,
                lazyload: true,
                lazyloadSelector: ".tns-lazy",
                speed: 500,
                autoplay: true,
                autoplayTimeout: 5000,
                autoplayButtonOutput: false,
                responsive: {
                    0: {
                        nav: false
                    },
                    768: {
                        nav: true
                    },
                    992: {
                        nav: true
                    }
                }
            });
        }
    });

}(jQuery));