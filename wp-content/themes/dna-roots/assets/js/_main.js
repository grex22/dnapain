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
      
      $(".fancybox").fancybox({
        /*maxWidth  : 800,
        maxHeight : 600,
        fitToView : false,
        width   : '70%',
        height    : '70%',
        autoSize  : false,
        closeClick  : false,
        openEffect  : 'none',
        closeEffect : 'none',
        type: 'iframe'*/
      });
      
      
      
      $('header.navbar').data('size','big');
      var $nav = $('header.navbar');

      if (navigator.userAgent.match(/(iPod|iPhone|iPad|Android)/)) {           
        $nav.addClass("minified");
        $nav.css('height','60px');
        $nav.find('.navbar-header').addClass('minified');
        $("#cycle").css('margin-top','39px');
      }else{
        
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
      }
      
      
      
    }
  },
  // Home page
  home: {
    init: function() {
      $('.tabbed-section .col-xs-4 ul li').on('click touchdown', function(e) {
        e.preventDefault();
        var li_index = $(this).index();
        $('.tabbed-section ul li').removeClass();
        $(this).addClass('active');
        $(this).closest('.row').find('.col-xs-8 ul li:eq('+li_index+')').addClass('active');
        var $mapwell = $(".col-xs-8 li.active .acf-map");
        if($mapwell.children(".marker").length > 0){
          render_map( $(".col-xs-8 li.active .acf-map") );
        }
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
      

      window.setTimeout(function() {
        if ( location.hash.length !== 0 ) {
            window.scrollTo(window.scrollX, window.scrollY - 73);
        }
      }, 1);

    }
  },
  locations: {
    init: function(){
      render_map( $(".acf-map") );
    }
  },
  patient_education_library: {
	  init:function(){
		  //Viewmedica
      	  client="2713"; width=750; vm_open();
	  }
  },
  tester: {
	  init:function(){
		  //Viewmedica
      	  client="2713"; width=750; vm_open();
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



//Google maps stuff

/*
*  This function will render a Google Map onto the selected jQuery element
*/

function render_map( $el ) {

	// var
	var $markers = $el.find('.marker');

	// vars
	var args = {
		zoom		: 16,
		center		: new google.maps.LatLng(0, 0),
		mapTypeId	: google.maps.MapTypeId.ROADMAP
	};

	// create map	        	
	var map = new google.maps.Map( $el[0], args);

	// add a markers reference
	map.markers = [];

	// add markers
	$markers.each(function(){

    	add_marker( $(this), map );

	});

	// center map
	center_map( map );

}

/*
*  This function will add a marker to the selected Google Map
*/

function add_marker( $marker, map ) {

	// var
	var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );

	// create marker
	var marker = new google.maps.Marker({
		position	: latlng,
		map			: map
	});

	// add to array
	map.markers.push( marker );

	// if marker contains HTML, add it to an infoWindow
	if( $marker.html() )
	{
		// create info window
		var infowindow = new google.maps.InfoWindow({
			content		: $marker.html()
		});

		// show info window when marker is clicked
		google.maps.event.addListener(marker, 'click', function() {

			infowindow.open( map, marker );

		});
	}

}

/*
*  This function will center the map, showing all markers attached to this map
*/

function center_map( map ) {
	// vars
	var bounds = new google.maps.LatLngBounds();

	// loop through all markers and create bounds
	$.each( map.markers, function( i, marker ){

		var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );

		bounds.extend( latlng );

	});

	// only 1 marker?
	if( map.markers.length == 1 )
	{
		// set center of map
	    map.setCenter( bounds.getCenter() );
	    map.setZoom( 16 );
	}
	else
	{
		// fit to bounds
		map.fitBounds( bounds );
	}
}

/*
*  This function will render each map when the document is ready (page has loaded)
*/

$(document).ready(function(){
	$('.home .tabbed-section li.active .acf-map').each(function(){
		render_map( $(this) );
	});
});


})(jQuery); // Fully reference jQuery after this point.






  




