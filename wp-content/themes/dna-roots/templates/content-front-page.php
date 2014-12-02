<article <?php post_class(); ?>>

  <div class="entry-content">

  	<h2 class="entry-title blue">About DNA Advanced Pain Management</h2>

    <?php

    	if ( has_post_thumbnail() ) {

			the_post_thumbnail('full');

		}

    	the_content();

    ?>

  </div>

</article>