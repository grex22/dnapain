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
      
      $clinic_address = get_field('clinic_address');
      $phone = get_field('phone');
      $fax = get_field('fax');
      $directions = get_field('directions');
      $google_map_link = get_field('google_map_link');
      
      if($clinic_address): ?>
      
      <h4>Address:</h4>
      <?php echo wpautop($clinic_address); ?>
      
      <?php endif;
      
      if($phone): ?>
      
      <h4>Telephone:</h4>
      <div><?php echo $phone; ?></div>
      
      <?php endif;
      
      if($fax): ?>
      
      <h4>Fax:</h4>
      <div><?php echo $fax; ?></div>
      
      <?php endif;
      
      if($google_map_link): ?>
      <hr>
      <a href="<?php echo $google_map_link; ?>" class="btn btn-primary">View on Google Maps <i class="fa fa-globe"></i></a>
      
      <?php endif;
      
      if($directions): ?>
      <hr>
      <h4>Directions to this Clinic</h4>
      
      <?php echo $directions; ?>
      
      <?php endif;
      
      ?>
    </div>
  </article>
<?php endwhile; ?>