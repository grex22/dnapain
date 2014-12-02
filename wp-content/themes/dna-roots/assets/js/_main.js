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
 *
 * Google CDN, Latest jQuery
 * To use the default WordPress version of jQuery, go to lib/config.php and
 * remove or comment out: add_theme_support('jquery-cdn');
 * ======================================================================== */

(function($) {

// Use this variable to set up the common and page specific functions. If you
// rename this variable, you will also need to rename the namespace below.
var Roots = {
  // All pages
  common: {
    init: function() {
      // JavaScript to be fired on all pages
    }
  },
  // Home page
  home: {
    init: function() {
      $('.carousel').carousel({interval: 7000});
      $('.tabbed-section ul li').on('click touchdown', function(e) {
        e.preventDefault();
        var li_index = $(this).index();
        $('.tabbed-section ul li').removeClass();
        $(this).addClass('active');
        $(this).closest('.row').find('.col-md-8 ul li:eq('+li_index+')').addClass('active');
      });
    }
  },
  // About us page, note the change from about-us to about_us.
  about_us: {
    init: function() {
      // JavaScript to be fired on the about us page
    }
  }
};

// The routing fires all common scripts, followed by the page specific scripts.
// Add additional events for more control over timing e.g. a finalize event
var UTIL = {
  fire: function(func, funcname, args) {
    var namespace = Roots;
    funcname = (funcname === undefined) ? 'init' : funcname;
    if (func !== '' && namespace[func] && typeof namespace[func][funcname] === 'function') {
      namespace[func][funcname](args);
    }
  },
  loadEvents: function() {
    UTIL.fire('common');

    $.each(document.body.className.replace(/-/g, '_').split(/\s+/),function(i,classnm) {
      UTIL.fire(classnm);
    });
  }
};

$(document).ready(UTIL.loadEvents);

})(jQuery); // Fully reference jQuery after this point.

$(function(){
  $('header > .container > .col-md-12 > .row').data('size','big');
});

$(window).scroll(function(){
    var $nav = $('header > .container > .col-md-12 > .row');
    if ($('body').scrollTop() > 60) {
        if ($nav.data('size') == 'big') {
            $nav.data('size','small').stop().animate({
                height:'60px',
            }, 300);
            $nav.find('.navbar-header').fadeTo(100,.2).delay(100).fadeTo(100,1).addClass('minified');
            $nav.find('nav').addClass('minified');
        }
    } else {
        if ($nav.data('size') == 'small') {
            $nav.data('size','big').stop().animate({
                height:'136px',
            }, 300);
            $nav.find('.navbar-header').fadeTo(100,.2).delay(100).fadeTo(100,1).removeClass('minified');
            $nav.find('nav').removeClass('minified');
        }  
    }
});
