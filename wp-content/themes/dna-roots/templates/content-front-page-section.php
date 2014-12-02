<section class="row">

		<aside class="col-md-4">

			<?php include roots_sidebar_path(); ?>

		</aside>

		<div class="col-md-8 help-section">

<?php
  while(have_posts()): the_post();
	if( have_rows( 'additional_sections' ) ) {

		while ( have_rows( 'additional_sections' ) ) {

			the_row();

			echo '<h2>' . get_sub_field( 'title' ) . '</h2>';

			the_sub_field( 'content' );

		}

	}
  endwhile;

?>

			<h2>Our Clinics</h2>

			<div class="tabbed-section row">

				<div class="col-xs-4">

					<ul>
						<li class="active"><i class="fa fa-map-marker"></i> Location, Lo</li>
						<li><i class="fa fa-map-marker"></i> Location, Lo</li>
						<li><i class="fa fa-map-marker"></i> Location, Lo</li>
						<li><i class="fa fa-map-marker"></i> Location, Lo</li>
						<li><i class="fa fa-map-marker"></i> Location, Lo</li>
					</ul>


				</div>

				<div class="col-xs-8">

					<ul>

						<li class="active">

							<div class="row">

								<div class="col-xs-12">

									<img src="/wp-content/themes/dna-roots/assets/img/map-placeholder.jpg">

								</div>

							</div>

							<div class="row">

								<div class="col-xs-6">

									Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
									tempor incididunt ut labore et dolore magna aliqua.

								</div>

								<div class="col-xs-6">

									<p><strong>Phone:</strong> 100-000-0000</p>

									<p><strong>Fax:</strong> 000-000-0000</p>

									<a href="#">Get Directions</a>

									<a href="#">Schedule an Appointment</a>

								</div>

							</div>

						</li>

						<li>

							<div class="row">

								<div class="col-xs-12">

									<img src="/wp-content/themes/dna-roots/assets/img/map-placeholder.jpg">

								</div>

							</div>

							<div class="row">

								<div class="col-xs-6">

									Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
									tempor incididunt ut labore et dolore magna aliqua.

								</div>

								<div class="col-xs-6">

									<p><strong>Phone:</strong> 200-000-0000</p>

									<p><strong>Fax:</strong> 000-000-0000</p>

									<a href="#">Get Directions</a>

									<a href="#">Schedule an Appointment</a>

								</div>

							</div>

						</li>

						<li>

							<div class="row">

								<div class="col-xs-12">

									<img src="/wp-content/themes/dna-roots/assets/img/map-placeholder.jpg">

								</div>

							</div>

							<div class="row">

								<div class="col-xs-6">

									Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
									tempor incididunt ut labore et dolore magna aliqua.

								</div>

								<div class="col-xs-6">

									<p><strong>Phone:</strong> 300-000-0000</p>

									<p><strong>Fax:</strong> 000-000-0000</p>

									<a href="#">Get Directions</a>

									<a href="#">Schedule an Appointment</a>

								</div>

							</div>

						</li>

						<li>

							<div class="row">

								<div class="col-md-12">

									<img src="/wp-content/themes/dna-roots/assets/img/map-placeholder.jpg">

								</div>

							</div>

							<div class="row">

								<div class="col-xs-6">

									Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
									tempor incididunt ut labore et dolore magna aliqua.

								</div>

								<div class="col-xs-6">

									<p><strong>Phone:</strong> 400-000-0000</p>

									<p><strong>Fax:</strong> 000-000-0000</p>

									<a href="#">Get Directions</a>

									<a href="#">Schedule an Appointment</a>

								</div>

							</div>

						</li>

						<li>

							<div class="row">

								<div class="col-md-12">

									<img src="/wp-content/themes/dna-roots/assets/img/map-placeholder.jpg">

								</div>

							</div>

							<div class="row">

								<div class="col-xs-6">

									Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
									tempor incididunt ut labore et dolore magna aliqua.

								</div>

								<div class="col-xs-6">

									<p><strong>Phone:</strong> 500-000-0000</p>

									<p><strong>Fax:</strong> 000-000-0000</p>

									<a href="#">Get Directions</a>

									<a href="#">Schedule an Appointment</a>

								</div>

							</div>

						</li>

					</ul>

				</div>

			</div>

<?php

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

<?php

	if ( has_post_thumbnail() ) {

		the_post_thumbnail('full');

	}

?>

			  </a>

			  <div class="media-body">

			    <h4 class="media-heading"><?php the_title(); ?></h4>

			    <!--<p class="entry-meta">Posted by DNA Pain in “General”</p>-->

			    <p><?php the_excerpt(); ?></p>

			    <a href="<?php the_permalink(); ?>" class="btn btn-primary"><i class="fa fa-arrow-right fa-inverse"></i> Read More</a>


			  </div>

			</div>

<?php

	}

?>

		</div>

</section>