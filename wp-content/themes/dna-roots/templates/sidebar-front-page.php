<section class="widget">
	<h3>Our Providers</h3>

	<?php
	$providers = get_field( 'providers', 15 );

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