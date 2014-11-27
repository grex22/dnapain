<?php while (have_posts()) : the_post(); ?>

	<section class="row">

  		<?php get_template_part('templates/content', 'front-page'); ?>

  	</section>

</div>

<div class="additional-content row">

	<?php get_template_part('templates/content', 'front-page-section'); ?>

<?php endwhile; ?>