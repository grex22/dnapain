<header class="banner navbar navbar-fixed-top" id="top" role="banner">
  <div class="container">
    <div class="navbar-header">
      <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        MENU
      </button>
      <button class="navbar-toggle phone-button" type="button">
        <i class="fa fa-phone"></i>
      </button>
			<a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
      <div id="cta-sm" class="cta-block pull-right">
        <button type="button" class="btn btn-primary"  href="#">Schedule</button>
        <!--<a href="tel:1-866-580-7246" class="tel"><i class="fa fa-phone"></i> 1 866 580-PAIN</a>-->
      </div>
    </div>

    <nav class="navbar-collapse bs-navbar-collapse collapse" role="navigation" aria-expanded="true">
      <?php
        if (has_nav_menu('primary_navigation')) :
          wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'nav navbar-nav'));
        endif;
      ?>
    <div id="cta-big" class="cta-block pull-right">
      <button type="button" class="btn btn-primary"  href="<?php echo get_permalink(40); ?>">Schedule</button>
      <div class="clearfix"></div>
      <a href="tel:1-866-580-7246" class="tel"><i class="fa fa-phone"></i> 1 866 580-PAIN</a>
    </div>
    </nav>
    
  </div>
</header>

<?php

  if( is_front_page() ) {

    get_template_part('templates/content', 'slider');

  }

?>