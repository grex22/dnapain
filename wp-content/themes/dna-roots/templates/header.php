<header class="banner navbar navbar-default navbar-static-top" role="banner">
  <div class="container">
    <div class="row center-col">
      <div class="col-lg-3 col-xs-6">
        <div class="navbar-header">
          <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
        </div>
      </div>
      <div class="col-lg-9 col-xs-6">
          <div class="row">
            <div class="col-md-9">
              <nav class="collapse navbar-collapse" role="navigation">
              <?php
                if (has_nav_menu('primary_navigation')) :
                  wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'nav navbar-nav'));
                endif;
              ?>
              </nav>
            </div>
            <div class="col-lg-3">
              <button type="button" class="btn btn-primary" href="#">Schedule</button>
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a href="tel:1-866-580-7246" class="tel"><i class="fa fa-phone pull-left"></i> 1 866 580-PAIN</a>
            </div>
          </div>
      </div>
    </div>
  </div>
</header>
<?php

  if( is_front_page() ) {

    get_template_part('templates/content', 'slider');

  }

?>