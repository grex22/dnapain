<section class="row">

		<aside class="col-md-4">

			<?php include roots_sidebar_path(); ?>

		</aside>

		<div class="col-md-8 help-section">

<?php

	if( have_rows( 'additional_sections' ) ) {

		while ( have_rows( 'additional_sections' ) ) {

			the_row();

			echo '<h2>' . get_sub_field( 'title' ) . '</h2>';

			the_sub_field( 'content' );

		}

	}

	$args =	array(

		'post_type' 	=> 'post',
		'post_count' 	=> 1

	);

	$the_query = new WP_Query ( $args );

	while ( $the_query->have_posts() ) {

		$the_query->the_post();

?>

			<h2 class="orange">Blog</h2>

			<div class="media featured-blog-post">

			  <a class="media-left" href="<?php the_permalink(); ?>">

			    <img src="<?php bloginfo('stylesheet_directory'); ?>/assets/img/post-placeholder.jpg">

			  </a>

			  <div class="media-body">

			    <h4 class="media-heading"><?php the_title(); ?></h4>

			    <p class="entry-meta">Posted by DNA Pain in “General”</p>

			    <p><?php the_excerpt(); ?></p>

			    <a href="<?php the_permalink(); ?>"><i class="fa fa-arrow-right light-red"></i> Read More</a>


			  </div>

			</div>

<?php

	}

?>

		</div>

</section>