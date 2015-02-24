<section class="row">
	<aside class="col-md-4">
		<?php include roots_sidebar_path(); ?>
	</aside>

	<div class="col-md-8 help-section">
    
	    <h2>How can we help you?</h2>
	    
	    <div class="row patient-paths">
	      <div class="col-md-4"><a href="<?php echo get_permalink(26); ?>"><i class="fa fa-star"></i>New Patients</a></div>
	      <div class="col-md-4"><a href="<?php echo get_permalink(32); ?>"><i class="fa fa-user"></i>Existing Patients</a></div>
	      <div class="col-md-4"><a href="<?php echo get_permalink(34); ?>"><i class="fa fa-heart"></i>Referring Providers</a></div>
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
					<?php
            
                      $locarray = array();
                      $locationsorder = get_field('locations_order','option');
            
                      $i=1;
                      foreach($locationsorder as $post):
                        setup_postdata($post);
                        ?>
                        <li class="<?php if($i==1) echo "active"; ?>"><i class="fa fa-map-marker"></i> <?php echo $post->post_title; ?></li>
                        <?php
            		  $i++;
                      endforeach; ?>
          		</ul>
			</div>
            <div class="col-xs-8">
			
			<ul>           
				<?php
				$i = 1;
		  foreach($locationsorder as $post):
		  	
		  	setup_postdata($post); ?>

					<li class="<?php if($i==1) echo "active"; ?>">

					  <div class="row">

					    <div class="col-xs-12">
                        <?php
                        $location = get_field('map_marker');
                            
						if( !empty($location) ):
						?>
						<div class="acf-map">
							<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
						</div>
						<?php endif; ?>

					      <?php
                  if(get_field('google_map_link')) echo "<a href='".get_field('google_map_link')."' target='_blank'>View on Google Maps";
                ?>
                
                <?php
                  if(get_field('google_map_link')) echo "</a><br>";
                ?>
					    </div>

					  </div>

					  <div class="row">
					    <div class="col-xs-6">
					    
					      <div><strong><?php echo $post->post_title; ?></strong></div>

					      <?php if(get_field('clinic_address')): ?><p><?php the_field('clinic_address'); ?></p><?php endif; ?>

					    </div>
					    <div class="col-xs-6">

					      <?php if(get_field('phone')): ?><p><strong>Phone:<br></strong> <?php the_field('phone'); ?></p><?php endif; ?>

					      <?php if(get_field('fax')): ?><p><strong>Fax:<br></strong> <?php the_field('fax'); ?></p><?php endif; ?>

					      <a href="<?php echo get_permalink($post->ID); ?>">Clinic Page</a>

					      <!--<a href="#">Schedule an Appointment</a>-->

					    </div>

					  </div>

					</li>

					<?php $i++; ?>
					<?php endforeach; ?>
                    <?php wp_reset_query(); ?>
            	</ul>
			</div>

		</div>
    
    
    <h2>Learn About Your Pain</h2>
 
    
    <div class="row">
      <div class="col-sm-3">
        <h4>When it comes to your pain, knowledge is power.</h4>
        <p>When you know the cause of your pain, you know how to fight it. Learn more about your pain, and schedule an appointment today</p>
      </div>
      <div class="col-sm-9">
      	<div class="pain-diagram">
        <img src="<?php bloginfo('stylesheet_directory'); ?>/assets/img/pain-diagram-bg.png">
        <a href="<?php echo get_permalink(166); ?>" class="hip">Hip / SI<br>Joint Pain</a>
        <a href="<?php echo get_permalink(168); ?>" class="knee">Knee<br>Pain</a>
        <a href="<?php echo get_permalink(204); ?>" class="sciatica">Sciatica<br>Pain</a>
        <a href="<?php echo get_permalink(165); ?>" class="back">Back<br>Pain</a>
        <a href="<?php echo get_permalink(167); ?>" class="shoulder">Shoulder<br>Pain</a>
        <a href="<?php echo get_permalink(164); ?>" class="neck">Neck<br>Pain</a>
      	</div>
      </div>
    </div>

		<?php
		$args =	array(
			'post_type'			=> 'post',
			'posts_per_page'	=> 1
		);

		$the_query = new WP_Query ( $args );

		while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

			<h2 class="orange">Blog</h2>

			<div class="media featured-blog-post">
				<div class="media-body">
					<h4 class="media-heading"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h4>
				    <!--<p class="entry-meta">Posted by DNA Pain in “General”</p>-->
			    	<a class="pull-left" href="<?php the_permalink(); ?>">
					<?php
						if ( has_post_thumbnail() ) :
							the_post_thumbnail('thumbnail');
						endif;
					?>
					</a>
					<?php the_excerpt(); ?>
				    <a href="<?php the_permalink(); ?>" class="btn btn-primary"><i class="fa fa-arrow-right fa-inverse"></i> Read More</a>
				</div>

			</div>

		<?php endwhile; ?>

	</div>

</section>
