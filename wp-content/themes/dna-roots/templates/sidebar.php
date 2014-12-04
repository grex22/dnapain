<?php
if ( is_front_page() ) {
	get_template_part( 'templates/sidebar-front-page' );
} elseif ( is_category() || is_archive() || is_singular('post') || is_home() ) {
	dynamic_sidebar( 'sidebar-blog' );
} else {
	global $post;
	$parent = false;
	$ancestors = get_ancestors( $post->ID, 'page' );
	if ( ! empty( $ancestors ) ) :
		$parent_id = $ancestors[0];
		$parent = get_post( $parent_id );
	endif;

	if ( $parent && isset( $parent->post_title ) ) :
		$menu_title = $parent->post_title;
	else :
		$menu_title = 'Menu';
	endif;
	?>
	<section class="widget nav_plus_widget-2 widget_nav_plus_widget">
		<h3><?php echo $menu_title; ?></h3>
		<?php wp_nav_menu( array( 'theme_location' => 'primary_navigation', 'start_depth' => 1 ) ); ?>
	</section>
	<?php

	dynamic_sidebar( 'sidebar-primary' );
}
