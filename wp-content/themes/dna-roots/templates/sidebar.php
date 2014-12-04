<?php
if ( is_front_page() ) {
	get_template_part( 'templates/sidebar-front-page' );
} elseif ( is_category() || is_archive() || is_singular('post') ) {
	dynamic_sidebar( 'sidebar-blog' );
}elseif (is_page(array('contact','contact-us'))){
  dynamic_sidebar( 'sidebar-contact' );
} else {
	dynamic_sidebar( 'sidebar-primary' );
}
