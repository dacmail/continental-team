/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 * ======================================================================== */

(function($) {

  // Use this variable to set up the common and page specific functions. If you
  // rename this variable, you will also need to rename the namespace below.
  var Sage = {
    // All pages
    'common': {
      init: function() {
        // JavaScript to be fired on all pages
        $('.header__menu-toggle').on('click', function(event) {
          event.preventDefault();
          event.stopPropagation();
          $('body').toggleClass('open-menu');
          $('.super-menu').toggleClass('open');
        });

        $('.super-menu__close').on('click', function(event) {
          event.preventDefault();
          $('body').removeClass('open-menu');
          $('.super-menu').removeClass('open');
        });

        $('body').on('click', function(event) {
          if ($('.super-menu').hasClass('open') && !$(event.target).closest('.super-menu').length) {
            event.preventDefault();
            $('.super-menu').removeClass('open');
            $('body').removeClass('open-menu');
          }
        });



        if ($('.news--listing').length > 0) {
          $(".news--listing").imagesLoaded(function () {
            var $grid = $('.news--listing').isotope({
              itemSelector: '.news__item',
              layoutMode: 'masonry',
              percentPosition: true,
              masonry: {
                  gutter: 0,
                  columnWidth: '.news__item:nth-child(2)',
                  horizontalOrder: true
              }
            });
            $('.news__filter a').on('click', function (e) {
              e.preventDefault();
              $('.news__filter a').removeClass('active');
              $(this).addClass('active');
              $grid.isotope({ filter: $(this).data('filter') });
            });
          });
        }
      },
      finalize: function() {
        // JavaScript to be fired on all pages, after page specific JS is fired
      }
    },
    // Home page
    'home': {
      init: function() {
        // JavaScript to be fired on the home page
      },
      finalize: function() {
        $('.carousel').owlCarousel({
          items: 1,
          dots: true,
          autoHeight: true,
          autoplay: true,
          autoplayTimeout: 5000,
          autoplayHoverPause: true
        });
        // JavaScript to be fired on the home page, after the init JS
      }
    },
    // About us page, note the change from about-us to about_us.
    'single': {
      init: function() {
        $(".article__gallery").owlCarousel({
          items: 1,
          nav: true,
          loop: true,
          autoHeight: true
        });
      }
    }
  };

  // The routing fires all common scripts, followed by the page specific scripts.
  // Add additional events for more control over timing e.g. a finalize event
  var UTIL = {
    fire: function(func, funcname, args) {
      var fire;
      var namespace = Sage;
      funcname = (funcname === undefined) ? 'init' : funcname;
      fire = func !== '';
      fire = fire && namespace[func];
      fire = fire && typeof namespace[func][funcname] === 'function';

      if (fire) {
        namespace[func][funcname](args);
      }
    },
    loadEvents: function() {
      // Fire common init JS
      UTIL.fire('common');

      // Fire page-specific init JS, and then finalize JS
      $.each(document.body.className.replace(/-/g, '_').split(/\s+/), function(i, classnm) {
        UTIL.fire(classnm);
        UTIL.fire(classnm, 'finalize');
      });

      // Fire common finalize JS
      UTIL.fire('common', 'finalize');
    }
  };

  // Load Events
  $(document).ready(UTIL.loadEvents);

})(jQuery); // Fully reference jQuery after this point.
