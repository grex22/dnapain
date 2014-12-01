<?php

	$title_colors = array( 'fuschia', 'peach', 'purple' );

?>

<section class="row">

		<aside class="col-md-4">

			<?php include roots_sidebar_path(); ?>

		</aside>

		<div class="col-md-8 help-section">

			<h2 class="<?php echo $title_colors[0]; ?>">How can we help you?</h2>

			<div class="row">

<?php

	if( have_rows( 'buttons' ) ) {

		$icons 	= array( 'star', 'user', 'heart' );
		$count 	= 0;

		while ( have_rows( 'buttons' ) ) {

			the_row();

?>

				<div class="col-md-4">

					<div>

						<i class="fa fa-<?php echo $icons[$count]; ?>"></i>

						<?php the_sub_field( 'title' ); ?>

						<a href="<?php the_sub_field( 'url' ); ?>" class="btn btn-primary">Read More</a>

					</div>

				</div>

<?php

			$count++;

		}

	}

?>

			</div>

<?php

	if( have_rows( 'additional_sections' ) ) {

		while ( have_rows( 'additional_sections' ) ) {

			the_row();

?>

			<h2 class="<?php echo $title_colors[0]; ?>">Learn about your pain</h2>


<div class="row">

				<div class="col-md-4">

					<h5>Wrist Pain</h5>

					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse sit amet risus non lectus malesuada pharetra. Nam venenatis quam ut orci elementum lacinia. Mauris mattis est orci, eu pellentesque ex malesuada eu.</p>

				</div>

				<div class="col-md-8">

					<img src="<?php bloginfo('stylesheet_directory'); ?>/assets/img/learn-about-your-pain.png">

				</div>

			</div>

			<h2 class="<?php echo $title_colors[0]; ?>">Our Clinics</h2>
			<?php /*get_template_part('templates/entry-meta');*/ ?>

			<div class="tabbed-section row">

				<div class="col-md-4">

					<ul>
						<li class="active"><i class="fa fa-map-marker"></i> Location, Lo</li>
						<li><i class="fa fa-map-marker"></i> Location, Lo</li>
						<li><i class="fa fa-map-marker"></i> Location, Lo</li>
						<li><i class="fa fa-map-marker"></i> Location, Lo</li>
						<li><i class="fa fa-map-marker"></i> Location, Lo</li>
					</ul>


				</div>

				<div class="col-md-8">

					<ul>
						<li class="active">Location, Lo</li>
						<li>Location, Lo</li>
						<li>Location, Lo</li>
						<li>Location, Lo</li>
						<li>Location, Lo</li>
					</ul>

				</div>

			</div>
<?php

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