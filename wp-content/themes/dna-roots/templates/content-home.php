<section class="row">

		<aside class="col-md-4">

			<?php include roots_sidebar_path(); ?>

		</aside>

		<div class="col-md-8 help-section">
    
    <h2>How can we help you?</h2>
    
    <div class="row patient-paths">
      <div class="col-md-4"><a href=""><i class="fa fa-star"></i>New Patients</a></div>
      <div class="col-md-4"><a href=""><i class="fa fa-user"></i>Existing Patients</a></div>
      <div class="col-md-4"><a href=""><i class="fa fa-heart"></i>Referring Physicians</a></div>
    </div>

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
          <?php if(get_field('locations', 'option')): ?>

            <?php $i=1; ?>
            <?php while(has_sub_field('locations', 'option')): ?>
              <li class="<?php if($i==1) echo "active"; ?>"><i class="fa fa-map-marker"></i> <?php the_sub_field('location_title'); ?></li>
              <?php $i++; ?>
            <?php endwhile; ?>


          <?php endif; ?>

					</ul>


				</div>

				<div class="col-xs-8">

					<ul>

            
            <?php if(get_field('locations', 'option')): ?>

              <?php $i=1; ?>
              <?php while(has_sub_field('locations', 'option')): ?>
                <li class="<?php if($i==1) echo "active"; ?>">

                  <div class="row">

                    <div class="col-xs-12">

                      <img src="/wp-content/themes/dna-roots/assets/img/map-placeholder.jpg">

                    </div>

                  </div>

                  <div class="row">
                    <div class="col-xs-6">
                    
                      <div><strong><?php the_sub_field('location_title'); ?></strong></div>

                      <?php if(get_sub_field('clinic_address')): ?><p><?php the_sub_field('clinic_address'); ?></p><?php endif; ?>

                    </div>
                    <div class="col-xs-6">

                      <?php if(get_sub_field('phone')): ?><p><strong>Phone:<br></strong> <?php the_sub_field('phone'); ?></p><?php endif; ?>

                      <?php if(get_sub_field('fax')): ?><p><strong>Fax:<br></strong> <?php the_sub_field('fax'); ?></p><?php endif; ?>

                      <a href="#">Clinic Page</a>

                      <a href="#">Schedule an Appointment</a>

                    </div>

                  </div>

                </li>

                <?php $i++; ?>
              <?php endwhile; ?>


            <?php endif; ?>
            
						


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