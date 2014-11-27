<article <?php post_class(); ?>>

  <div class="entry-content">

  	<?php

    	if ( has_post_thumbnail() ) {

			the_post_thumbnail('full');

		}

	?>

  	<h2 class="entry-title blue">About DNA Advanced Pain Management</h2>

    <?php the_content(); ?>

  </div>

</article>