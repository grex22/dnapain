<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    <header>
      <h1 class="entry-title"><?php the_title(); ?></h1>
    </header>
    <div class="entry-content">
      <?php 
      if ( has_post_thumbnail() ) {
        the_post_thumbnail('large');
      }
      the_content();
      ?>
    </div>
  </article>
<?php endwhile; ?>