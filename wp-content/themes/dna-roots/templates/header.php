<header class="banner navbar navbar-default navbar-fixed-top" role="banner">
  <div class="container">
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-3">
          <div class="navbar-header">
			<a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
          </div>
        </div>
      </div>
      <div class="col-lg-9 col-xs-6">
          <div class="row">
            <div class="col-lg-9">
              <nav class="collapse navbar-collapse" role="navigation">
              <?php
                if (has_nav_menu('primary_navigation')) :
                  wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'nav navbar-nav'));
                endif;
              ?>
              </nav>
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