<?php

	$count = 7;

	$cols = '6';

	$args =	array(

		'post_type' 	=> 'providers',

		'post_count' 	=> $count

	);

	$the_query = new WP_Query ( $args );

	echo '<a href="#" class="btn btn-primary hide-md"><i class="fa fa-youtube-play"></i> Our Providers</a>';

	echo '<a href="#" class="btn btn-primary hide-md"><i class="fa fa-user-md"></i> Practice Introduction</a>';

	echo '<a href="#" class="btn btn-primary hide-md"><i class="fa fa-graduation-cap"></i> Patient Education</a>';

	echo '<h2>Our Providers</h2>';

	echo '<div class="row providers">';

	while( $the_query->have_posts()) {

		$the_query->the_post();

		if( $count == 3 ) {

			$cols = '4';

			echo '</div>';

			echo '<div class="row providers three-col">';

		}

		echo '<a href="'.get_permalink().'" class="col-md-'.$cols.'">';

		if ( has_post_thumbnail() ) {

			the_post_thumbnail('full');

		}

		the_title();

		echo '</a>';

		$count--;

	}

	echo '</div>';

	dynamic_sidebar('sidebar-frontpage');

?>