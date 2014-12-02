<article <?php post_class(); ?>>

  <div class="entry-content">

  	<h2 class="entry-title blue"><?php
      if(is_front_page()){
        echo "About DNA Advanced Pain Management";
      }else{
        if(get_field('alternate_title')){
          the_field('alternate_title');
        }else{
          the_title();
        }
      }
    ?></h2>

    <?php

    	if ( has_post_thumbnail() ) {

        the_post_thumbnail('full');

      }
      if(is_front_page()){
        the_content();
      }else{
        if(get_field('page_introduction')){
          echo wpautop(get_field('page_introduction'));
        }
      }

    ?>

  </div>

</article>