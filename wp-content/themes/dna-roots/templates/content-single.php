<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    <header>
      <h1 class="entry-title"><?php the_title(); ?></h1>
      <?php get_template_part('templates/entry-meta'); ?>
    </header>
    <div class="entry-content">
      <?php 
      if ( has_post_thumbnail() ) {
        the_post_thumbnail('large');
      }
      the_content();
      ?>
      <hr>
      <a class="btn btn-primary share-btn" href="">Share <i class="fa fa-share pull-right"></i></a>
      <div class="social-shares">
        <!-- AddToAny BEGIN -->
        <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
          <a class="a2a_dd add2any_share" href="https://www.addtoany.com/share_save"></a>
        </div>
        <script type="text/javascript">
        var a2a_config = a2a_config || {};
        a2a_config.onclick = 1;
        </script>
        <script type="text/javascript" src="//static.addtoany.com/menu/page.js"></script>
        <!-- AddToAny END -->
      </div>
    </div>
    <footer>
      <?php wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'roots'), 'after' => '</p></nav>')); ?>
    </footer>
  </article>
<?php endwhile; ?>