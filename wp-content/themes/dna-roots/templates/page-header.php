<article>

  <div class="entry-content">

  	<h2 class="entry-title blue short-underline"><?php
      if(is_front_page()){
        echo "About DNA Advanced Pain Management";
      } else if ( is_category() ) {
        echo "Pain Management Blog";
      } else if ( is_archive() ) {
        echo roots_title();
      } else if ( is_singular( 'post' ) ) {
        echo '<a href="/category/pain-management/">← Pain Management Blog</a>';
      } else {
        if(get_field('alternate_title')){
          the_field('alternate_title');
        }else{
          the_title();
        }
      }
    ?></h2>

    <?php

      // if ( has_post_thumbnail() ) {

      //   the_post_thumbnail('full');

      // }
      if (is_front_page() ) {
        the_content();
      } else {
        if ( get_field('page_introduction') ) {
          echo wpautop(get_field('page_introduction'));
        }
      }

    ?>

  </div>

</article>