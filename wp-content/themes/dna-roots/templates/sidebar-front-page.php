<section class="mobile-btns">
<a href="<?php echo get_permalink(22); ?>" class="btn btn-primary"><i class="fa fa-youtube-play"></i> Our Providers</a>
<a href="<?php echo get_permalink(7); ?>" class="btn btn-primary"><i class="fa fa-user-md"></i> About DNA Pain</a>
<a href="<?php echo get_permalink(28); ?>" class="btn btn-primary"><i class="fa fa-graduation-cap"></i> Patient Information</a>
</section>
<section class="widget">
	<h3>Our Providers</h3>

	<?php
	$providers_page = get_page_by_title( 'Providers' );
	$providers = get_field( 'providers', $providers_page->ID );

	if( $providers ): ?>
	    <ul id="providers" class="clearfix">
	    <?php foreach( $providers as $post) : setup_postdata($post); ?>
	        <?php
	          $provider_photo = get_field( 'provider_photo', $post->ID );
	          $classes = ( 'yes' == get_field( 'doctor', $post->ID ) ) ? 'col-md-6 large' : 'col-md-4 small';
	          $slug = sanitize_title( get_the_title() );
	        ?>
	        <li class="<?php echo $classes; ?> text-center">
	        	<a href="<?php echo home_url( '/providers/#' . $slug ); ?>">
	        		<img src="<?php echo $provider_photo['sizes']['thumbnail']; ?>" alt="" />
	        		<span class="text-center"><?php the_title(); ?></span>
	        	</a>
	        </li>
	    <?php endforeach; ?>
	    </ul>
	    <?php wp_reset_postdata(); ?>
	<?php endif; ?>

</section>
<?php dynamic_sidebar('sidebar-frontpage'); ?>