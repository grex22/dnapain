<?php the_content();

$locations = get_field('locations');
$locationsformap = $locations; ?>

<?php if( $locationsformap ): ?>
  <!--
	<div class="acf-map">
		<?php foreach ( $locationsformap as $post ) : setup_postdata($post);; 

			$pin = get_field('map_marker');

			?>
			<div class="marker" data-lat="<?php echo $pin['lat']; ?>" data-lng="<?php echo $pin['lng']; ?>">
				<h4><?php echo $post->post_title; ?></h4>
				<p class="address"><?php the_field('clinic_address'); ?></p>
				<p>Phone: <?php the_field('phone'); ?></p>
			</div>
	<?php endforeach; ?>
	</div>
  -->
<?php endif; ?>
<?php wp_reset_postdata(); ?>


<?php 

if( $locations  ): ?>

    <ul id="providers" class="locations-list">
    <?php foreach( $locations as $post) : setup_postdata($post); ?>
        <?php
        ?>
        <li class="row">

          <div class="col-sm-3">
            <br>
            <?php
              $clinic_address = get_field('clinic_address');
              $phone = get_field('phone');
              $fax = get_field('fax');
              $google_map_link = get_field('google_map_link');
            ?>
            <a href="<?php echo get_permalink($post->id); ?>"><?php the_post_thumbnail('medium'); ?></a>
            <?php if($google_map_link): ?>
              <br>
              <a href="<?php echo $google_map_link;?>" class="btn btn-primary" target="_blank">View on Google Maps <i class="fa fa-map-marker"></i></a>
            <?php endif; ?>
          </div>

          <div class="col-sm-6">
            <h3><a href="<?php echo get_permalink($post->id); ?>"><?php echo $post->post_title; ?></a></h3>

            
            <?php if($clinic_address) echo wpautop($clinic_address); ?>
            <?php if($phone) echo "<div>Phone: ".$phone . "</div>"; ?>
            <?php if($fax) echo "<div>Fax: ".$fax . "</div>"; ?>
            <br>
            <a href="<?php echo get_permalink($post->id);?>"><i class="fa fa-info-circle"></i> More Information </a>
          </div>

          <div class="col-sm-3">
            
            
            
          </div>

        </li>
    <?php endforeach; ?>
    </ul>
    <?php wp_reset_postdata(); ?>
<?php endif; ?>

<?php get_template_part( 'templates/parts/expandable_list' ); ?>
<?php //wp_link_pages(array('before' => '<nav class="pagination">', 'after' => '</nav>')); ?>