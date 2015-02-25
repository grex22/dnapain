<header class="banner navbar navbar-fixed-top" id="top" role="banner">
  <div class="container">
    <div class="navbar-header">
      <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        MENU
      </button>
      <a class="navbar-toggle phone-button" href="tel://412-561-7246">
        <i class="fa fa-phone"></i>
      </a>
			<a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
      <div id="cta-sm" class="cta-block pull-right">
       	<form style="margin:0;display:inline-block" action="https://securepayments.cardconnect.com/hpp/payment/" method="post" target="_blank">
        	<!-- test is securepaymentstest.cardconnect.com.... -->
          
          <!-- 496160873888   -->
          <input type="hidden" name="ccId" value="cvOKhVtJeFUH347D7XXL/tWymEyFjvsFYmhYgbnNBeBUgzLYGnv6Y6TP2jKRULLmUXeG+HrMAdP1L2Gfs8pT4L9snUzhuuePJTassZvgqTAJPhAWWYkiyMXo6mraHwDWjVucKxuhqDn9yuuuVboJ8RvkjL3nIHqqoWBLssWY2XE=" />
          <!-- test ccid is:
          I2iP4irvKDM8MMN/RUnJY3cZn+tYF7arGdXVfzxeCESnFOsajsIcBEejW2tGwpzich5BTnLQ/lsAmzHlxh0X1efWqiyrKLe/jyZRWrcauMcwgNHhauIriWTxDvhIbJ2Fq6thni9sogy44RHvtV65KU23ghVjx6bzQ1ew4aFclbo=
          
          -->     
          <input type="hidden" name="ccSite" value="fts">
          <input type="hidden" name="ccPostbackUrl" value="<?php echo home_url( '/?cardconnect=true' ); ?>">
          <button type="submit" name="submit" style="background: transparent;color: #06C;border: 0;font-size: 15px;padding: 2px 5px;margin: 0 0 5px 0;"><i class="fa fa-credit-card"></i> Make a Payment</button>
          
        </form>
        <a class="btn btn-primary"  href="<?php echo get_permalink(40); ?>">Schedule</a>
        <a href="tel://412-561-7246" class="tel"><i class="fa fa-phone"></i> 412-561-7246</a>
      </div>
    </div>

    <nav class="navbar-collapse bs-navbar-collapse collapse" role="navigation" aria-expanded="true">
      <?php
        if (has_nav_menu('primary_navigation')) :
          wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'nav navbar-nav'));
        endif;
      ?>
    <div id="cta-big" class="cta-block pull-right">
      <form style="margin:0;display:inline-block" action="https://securepayments.cardconnect.com/hpp/payment/" method="post" target="_blank">
          
          <!-- 496160873888   -->
          <input type="hidden" name="ccId" value="I2iP4irvKDM8MMN/RUnJY3cZn+tYF7arGdXVfzxeCESnFOsajsIcBEejW2tGwpzich5BTnLQ/lsAmzHlxh0X1efWqiyrKLe/jyZRWrcauMcwgNHhauIriWTxDvhIbJ2Fq6thni9sogy44RHvtV65KU23ghVjx6bzQ1ew4aFclbo=" />       
          <input type="hidden" name="ccSite" value="fts">
          <input type="hidden" name="ccPostbackUrl" value="<?php echo home_url( '/?cardconnect=true' ); ?>">
          <button type="submit" name="submit" style="background: transparent;color: #06C;border: 0;font-size: 15px;padding: 2px 5px;margin: 0 0 5px 0;"><i class="fa fa-credit-card"></i> Make a Payment</button>
          
        </form>
      <a class="btn btn-primary"  href="<?php echo get_permalink(40); ?>">Schedule</a>
      <div class="clearfix"></div>
      
        
      <a href="tel://412-561-7246" class="tel"><i class="fa fa-phone"></i> 412-561-7246</a>
    </div>
    </nav>
    
  </div>
</header>

<?php

  if( is_front_page() ) {

    get_template_part('templates/content', 'slider');

  }

?>