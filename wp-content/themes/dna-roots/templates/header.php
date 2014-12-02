<header class="banner navbar navbar-default navbar-fixed-top" role="banner">
  <div class="container">
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-3">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
          </div>
        </div>
        <div class="col-md-9">
          <nav class="collapse navbar-collapse" role="navigation">
            <div class="row">
              <div class="col-md-9">
                <?php
                  if (has_nav_menu('primary_navigation')) :
                    wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'nav navbar-nav'));
                  endif;
                ?>
              </div>
              <div class="col-md-3">
                <button type="button" class="btn btn-primary" href="#">Schedule</button>
                <a href="tel:1-866-580-7246" class="tel"><i class="fa fa-phone pull-left"></i> 1 866 580-PAIN</a>
              </div>
            </div>
          </nav>
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
