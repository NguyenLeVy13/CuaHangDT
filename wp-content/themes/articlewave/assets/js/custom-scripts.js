/**
 * Tab switcher
 */
document.addEventListener("DOMContentLoaded", function () {
    if (document.body.classList.contains('home')){
        const popularTab = document.getElementById("popular-tab");
        const recentTab = document.getElementById("recent-tab");
        const popularPosts = document.getElementById("popular-posts");
        const recentPosts = document.getElementById("recent-posts");
        if (popularTab) {
            popularPosts.style.display = "block";
            recentPosts.style.display = "none";
            popularTab.classList.add("isActive");
        } else {
            popularPosts.style.display = "none";
            recentPosts.style.display = "block";
            recentTab.classList.add("isActive");
        }
        popularTab.addEventListener("click", function () {
            popularPosts.style.display = "block";
            recentPosts.style.display = "none";
            popularTab.classList.add("isActive");
            recentTab.classList.remove("isActive");
        });
        recentTab.addEventListener("click", function () {
            popularPosts.style.display = "none";
            recentPosts.style.display = "block";
            popularTab.classList.remove("isActive");
            recentTab.classList.add("isActive");
        });
    }
});





/**
 * Site mode switcher
 */
document.addEventListener("DOMContentLoaded", function() {
  var modeSwitcher = document.getElementById("mode-switcher");
  var templateBodyClass = document.body;

  function setSiteMode(mode) {
      localStorage.setItem("site-mode", mode);
  }

  function getSiteMode() {
      return localStorage.getItem("site-mode");
  }

  // Check if a site mode is stored in local storage and set the mode accordingly
  var modeStored = getSiteMode();
  if (modeStored) {
      if (modeStored === "dark-mode") {
          // Set dark mode
          modeSwitcher.classList.remove("light-mode");
          modeSwitcher.classList.add("dark-mode");
          modeSwitcher.setAttribute("data-site-mode", "dark-mode");
          templateBodyClass.classList.remove('site-mode--light');
          templateBodyClass.classList.add('site-mode--dark');
      } else {
          // Set light mode (or default)
          modeSwitcher.classList.remove("dark-mode");
          modeSwitcher.classList.add("light-mode");
          modeSwitcher.setAttribute("data-site-mode", "light-mode");
          templateBodyClass.classList.remove('site-mode--dark');
          templateBodyClass.classList.add('site-mode--light');
      }
  }

  // Add click event listener to mode switcher
  modeSwitcher.addEventListener("click", function(e) {
      e.preventDefault();
      var currentMode = modeSwitcher.getAttribute("data-site-mode");

      if (currentMode === "light-mode") {
          // Switch to dark mode
          setSiteMode("dark-mode");
          modeSwitcher.classList.remove("light-mode");
          modeSwitcher.classList.add("dark-mode");
          modeSwitcher.setAttribute("data-site-mode", "dark-mode");
          templateBodyClass.classList.remove('site-mode--light');
          templateBodyClass.classList.add('site-mode--dark');
      } else {
          // Switch to light mode
          setSiteMode("light-mode");
          modeSwitcher.classList.remove("dark-mode");
          modeSwitcher.classList.add("light-mode");
          modeSwitcher.setAttribute("data-site-mode", "light-mode");
          templateBodyClass.classList.remove('site-mode--dark');
          templateBodyClass.classList.add('site-mode--light');
      }
  });
});

jQuery(document).ready(function($) {

    var headerSticky    = MT_JSObject.header_sticky,
        sidebarSticky   = MT_JSObject.sidebar_sticky,
        liveSearch      = MT_JSObject.live_search,
        ajaxUrl         = MT_JSObject.ajaxUrl,
        _wpnonce        = MT_JSObject._wpnonce,
        KEYCODE_TAB     = 9;

    var rtl = false;
    var dir = "left";
    if ($('body').hasClass("rtl")) {
        rtl = true;
        dir = "right";
    };

    /**
    * LightSlider
    */
    $('#slider-single-post').lightSlider({
        adaptiveHeight:true,
        item:1,
        slideMargin:0,
        loop:true,
        rtl:rtl,
        enableDrag: true,
        pauseOnHover: true,
    });

    /**
    * Search Toggle
    */
    $('.header-search-wrapper .search-icon').click(function() {
        $('.search-form-wrap').toggleClass('active-search');
        $('.search-form-wrap .search-field').focus();
        var element = document.querySelector('.header-search-wrapper');
        if (element) {
            $(document).on('keydown', function(e) {
                if (element.querySelectorAll('.search-form-wrap.active-search').length === 1) {
                    var focusable = element.querySelectorAll('button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])');
                    var firstFocusable = focusable[0];
                    var lastFocusable = focusable[focusable.length - 1];
                   articlewave_focus_trap(firstFocusable, lastFocusable, e);
                }
            })
        }
    });

    $('.header-search-wrapper .search-icon-close').click(function() {
        $('.search-form-wrap').removeClass('active-search');
    });

    /**
     * Preloader
     */
    if ($('#articlewave-preloader').length > 0) {
        setTimeout(function() {
            $('#articlewave-preloader').hide();
        }, 600);
    }

     /**
     * Scripts for Header Sidebar Toggle
     */
    $('.sidebar-menu-toggle').click(function() {
        $('.sticky-header-sidebar').toggleClass('isActive');
    });

    $('.sticky-sidebar-close,.sticky-header-sidebar-overlay').click(function() {
        $('.sticky-header-sidebar').removeClass('isActive');

    });

    /**
     * Responsive menu toggle
     */
    $('.articlewave-menu-toogle').click(function(event) {
        $('#site-navigation .primary-menu-wrap').toggleClass('isActive').slideToggle('slow');
        var element = document.querySelector('.articlewave-menu-toogle');
        if (element) {
            $(document).on('keydown', function(e) {
                if (element.querySelectorAll('#site-navigation .primary-menu-wrap.isActive').length === 1) {
                    var focusable = element.querySelectorAll('button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])');
                    var firstFocusable = focusable[0];
                    var lastFocusable = focusable[focusable.length - 1];
                    articlewave_focus_trap(firstFocusable, lastFocusable, e);
                }
            })
        }
    });

    /**
     * Responsive sub menu toggle
     */
    $('<a class="articlewave-sub-toggle" href="javascript:void(0);"><i class="bx bx-chevron-down"></i></a>').insertAfter('#site-navigation .menu-item-has-children>a, #site-navigation .page_item_has_children>a');

    $('#site-navigation .articlewave-sub-toggle').click(function() {
        $(this).parent('.menu-item-has-children').children('ul.sub-menu').first().slideToggle('1000');
        $(this).parent('.page_item_has_children').children('ul.children').first().slideToggle('1000');
        $(this).children('.bx-chevron-up').first().toggleClass('bx-chevron-down');
    });

    // Initialize Masonry for front page
    initializeMasonryLayout('.front-grid--masonry  .articlewave-archive-posts-wrapper');

    // Initialize Masonry for archive page
    initializeMasonryLayout('.archive-grid--masonry  .articlewave-archive-posts-wrapper');

    /**
     * Masonry Layout for both front page and archive page.
     */
    function initializeMasonryLayout(gridSelector) {
        var grid = document.querySelector(gridSelector),
            masonry;

        if (
            grid &&
            typeof Masonry !== 'undefined' &&
            typeof imagesLoaded !== 'undefined'
        ) {
            imagesLoaded(grid, function (instance) {
                masonry = new Masonry(grid, {
                    itemSelector: 'article'
                });
            });
        }
    }

    /**
     * Scroll Top.
     */
    $(window).scroll(function() {
        if ($(this).scrollTop() > 1000) {
            $('.articlewave-scrollup').fadeIn('slow');
        } else {
            $('.articlewave-scrollup').fadeOut('slow');
        }
    });
    $('.articlewave-scrollup').click(function() {
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });

    /**
     * focus trap
     */
    function articlewave_focus_trap( firstFocusable, lastFocusable, e ) {
        if (e.key === 'Tab' || e.keyCode === KEYCODE_TAB) {
            if ( e.shiftKey ) /* shift + tab */ {
                if (document.activeElement === firstFocusable) {
                    lastFocusable.focus();
                    e.preventDefault();
                }
            } else /* tab */ {
                if ( document.activeElement === lastFocusable ) {
                    firstFocusable.focus();
                    e.preventDefault();
                }
            }
        }
    }

    /**
     * Sticky Header
     */
    if ('true' === headerSticky) {
        var windowWidth = $(window).width();

        if (windowWidth > 600) {
            var wpAdminBar = $('#wpadminbar');
            if (wpAdminBar.length) {
                $("#masthead").sticky({
                    topSpacing: wpAdminBar.height()
                });
            } else {
                $("#masthead").sticky({
                    topSpacing: 0
                });
            }
        }

    }

     /**
     * Live Search
     */
    if (liveSearch === 'true') {
        var searchContainer = $(".header-search-wrapper");

        if (searchContainer.length > 0) {
            var searchFormContainer = searchContainer.find("form");

            searchContainer.on('input', 'input[type="search"]', function() {
                var searchKey = $(this).val();

                if (searchKey) {
                    $.ajax({
                        method: 'post',
                        url: ajaxUrl,
                        data: {
                            action: 'articlewave_search_posts_content',
                            search_key: searchKey,
                            security: _wpnonce
                        },
                        beforeSend: function() {
                            searchFormContainer.addClass('retrieving-posts');
                            searchFormContainer.removeClass('results-loaded');
                        },
                        success: function(res) {
                            var parsedRes = JSON.parse(res);
                            searchContainer.find(".articlewave-search-results-wrap").remove();
                            searchFormContainer.after(parsedRes.posts);
                            searchFormContainer.removeClass('retrieving-posts').addClass('results-loaded');
                        },
                        complete: function() {
                            // Render search content here
                        }
                    });
                } else {
                    searchContainer.find(".articlewave-search-results-wrap").remove();
                    searchFormContainer.removeClass('results-loaded');
                }
            });
        }
    }

    /**
     * close live search
     */
    $(document).mouseup(function (e) {
        var container = $(".header-search-wrapper");
        if (!container.is(e.target) && container.has(e.target).length === 0) {
            container.find(".articlewave-search-results-wrap").remove();
            container.removeClass('results-loaded');
        }
    });

    /**
     * Sticky Sidebar
     */
    if ('true' === sidebarSticky) {

      $('#secondary').theiaStickySidebar({
        additionalMarginTop: 30
      });

      $('#left-secondary').theiaStickySidebar({
        additionalMarginTop: 30
      });

      $('#primary').theiaStickySidebar({
        additionalMarginTop: 30
      });

    }

});

