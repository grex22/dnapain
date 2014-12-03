<?php get_template_part('templates/head'); ?>
<body <?php body_class(); ?>>

  <!--[if lt IE 8]>
    <div class="alert alert-warning">
      <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'roots'); ?>
    </div>
  <![endif]-->

  <?php
    do_action('get_header');
    get_template_part('templates/header');
  ?>
  <div class="gray-page-header home">
    <div class="wrap container" role="document">
      <div class="content row">
        <section class="row">
          <main class="main col-md-8" role="main">
            <?php while (have_posts()) : the_post(); ?>
              <?php get_template_part('templates/page', 'header'); ?>
            <?php endwhile; ?>
          </main><!-- /.main -->
        </section>
      </div><!-- /.content -->
    </div>
  </div>
  
  <div class="wrap container main-content-well" role="document">
    <div class="content row">
      
      <main class="main col-md-8" role="main">
        <div class="additional-content row">
          <?php include roots_template_path(); ?>
        </div>
      </main><!-- /.main -->
      
      <?php if (roots_display_sidebar()) : ?>
        <aside class="sidebar" role="complementary">
          <?php include roots_sidebar_path(); ?>
        </aside><!-- /.sidebar -->
      <?php endif; ?>
      
    </div><!-- /.content -->
  </div><!-- /.wrap -->
  
  <?php get_template_part('templates/footer'); ?>

  <?php wp_footer(); ?>

</body>
</html>
