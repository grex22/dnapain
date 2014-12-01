<h2>Our Providers</h2>

<div class="row providers">

<?php

	$args =	array(

		'post_type' 	=> 'providers',
		'post_count' 	=> 4

	);

	$the_query = new WP_Query ( $args );

	while ( $the_query->have_posts() ) {

		$the_query->the_post();


		echo '<a href="'.get_permalink().'" class="col-md-6">';

		if ( has_post_thumbnail() ) {

			the_post_thumbnail('full');

		}

		the_title();

		echo '</a>';

	}

?>

</div>

<div class="row providers three-col">

	<a href="#" class="col-md-4">
		<img src="<?php bloginfo('stylesheet_directory'); ?>/assets/img/profiles/small-bio-placeholder.jpg">
		Yeshvant A Navalgund M.D
	</a>

	<a href="#" class="col-md-4">
		<img src="<?php bloginfo('stylesheet_directory'); ?>/assets/img/profiles/small-bio-placeholder.jpg">
		Yeshvant A Navalgund M.D
	</a>

	<a href="#" class="col-md-4">
		<img src="<?php bloginfo('stylesheet_directory'); ?>/assets/img/profiles/small-bio-placeholder.jpg">
		Yeshvant A Navalgund M.D
	</a>

</div>

<?php dynamic_sidebar('sidebar-frontpage'); ?>