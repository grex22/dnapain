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
  <div class="gray-page-header">
    <div class="wrap container page_padding" role="document">
      <?php get_template_part('templates/page', 'header'); ?>
    </div>
  </div>
  
  <div class="wrap container main-content-well" role="document">
    <div class="content row">
      
      <main class="main col-md-8" role="main">
        <?php include roots_template_path(); ?>
      </main><!-- /.main -->
      
      <?php if (roots_display_sidebar()) : ?>
        <aside class="sidebar" role="complementary">
          <?php include roots_sidebar_path(); ?>
        </aside><!-- /.sidebar -->
      <?php endif; ?>
    </div><!-- /.content -->
    <?php //get_additional_content(); ?>
  </div><!-- /.wrap -->
  
  <div class="wrap prefooter">
    <div class="container">
      <div class="row">
        <div class="col-sm-8">
          <h3>You don’t have to live with your pain. Schedule an appointment with us today!</h3>
        </div>
        <div class="col-sm-4">
          <a href="#" class="btn inverse-cta-btn"><i class="fa fa-arrow-right pull-right"></i> Contact Us </a>
        </div>
      </div>
    </div>
  </div>

  <?php get_template_part('templates/footer'); ?>

  <?php wp_footer(); ?>
  
  <script type="text/javascript" src="https://www.swarminteractive.com/js/vm.js"></script>
  <script type="text/javascript">client="2713"; width=580; vm_open();</script>

</body>
</html>
