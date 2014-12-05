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
      $('.share-btn').on( 'click', function( e ) {
        e.preventDefault();

        $('.add2any_share span').trigger('click');
      });
    }
  },
  // Home page
  home: {
    init: function() {
      $('.tabbed-section ul li').on('click touchdown', function(e) {
        e.preventDefault();
        var li_index = $(this).index();
        $('.tabbed-section ul li').removeClass();
        $(this).addClass('active');
        $(this).closest('.row').find('.col-xs-8 ul li:eq('+li_index+')').addClass('active');
      });
    }
  },
  // About us page, note the change from about-us to about_us.
  about_us: {
    init: function() {
      // JavaScript to be fired on the about us page
    }
  },
  // Providers page
  providers: {
    init: function() {
      // JavaScript to be fired on the providers page
      $(".fancybox").fancybox({
        maxWidth  : 800,
        maxHeight : 600,
        fitToView : false,
        width   : '70%',
        height    : '70%',
        autoSize  : false,
        closeClick  : false,
        openEffect  : 'none',
        closeEffect : 'none',
        type: 'iframe'
      });

      window.setTimeout(function() {
        if ( location.hash.length !== 0 ) {
            window.scrollTo(window.scrollX, window.scrollY - 73);
        }
      }, 1);

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
  $('header.navbar').data('size','big');
});

$(window).scroll(function(){
  var $nav = $('header.navbar');
  if ($('body').scrollTop() > 60) {
    if ($nav.data('size') === 'big') {
      $nav.data('size','small').stop().animate({
          height:'60px',
      }, 200);
      $nav.find('.navbar-header').fadeTo(50,0.2).delay(50).fadeTo(100,1).addClass('minified');
      $nav.addClass('minified');
    }
  } else {
    if ($nav.data('size') === 'small') {
      $nav.data('size','big').stop().animate({
          height:'119px',
      }, 50);
      $nav.find('.navbar-header').fadeTo(50,0.2).delay(50).fadeTo(100,1).removeClass('minified');
      $nav.removeClass('minified');
    }
  }
});

players = new Array();

function onYouTubeIframeAPIReady() {
    var temp = $("iframe.yt_players");
    for (var i = 0; i < temp.length; i++) {
        var t = new YT.Player($(temp[i]).attr('id'), {
            events: {
                'onStateChange': onPlayerStateChange
            }
        });
        players.push(t);
    }

}
onYouTubeIframeAPIReady();


function onPlayerStateChange(event) {

    if (event.data == YT.PlayerState.PLAYING) {
        //alert(event.target.getVideoUrl());
       // alert(players[0].getVideoUrl());
        var temp = event.target.getVideoUrl();
        var tempPlayers = $("iframe.yt_players");
        for (var i = 0; i < players.length; i++) {
            if (players[i].getVideoUrl() != temp) players[i].stopVideo();

        }
    }
}