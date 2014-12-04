<?php
  if ( have_rows( 'slides' ) ) :
    $numslides = count ( get_field( 'slides' ) );
    $i = 0;
?>
<div id="cycle" class="cycle-slideshow text-center" data-cycle-fx="fadeOut" data-cycle-timeout="10000" data-slides=".item">

  <div class="cycle-pager"></div>
  <?php
    $i = 0;
    
    while ( have_rows( 'slides' ) ):
      the_row();
      $title    = get_sub_field( 'title' );
      $button   = get_sub_field( 'button' );
      $href     = get_sub_field( 'href' );
      $img      = get_sub_field( 'img' );
  ?>

  <div class="item <?php if( $i == 0 ) echo "active"; ?>" style="background-image: url('<?php echo $img; ?>');">
    <div class="container">
    <div class="cycle-caption">
      <h3><?php echo $title; ?></h3>
      <a class="btn btn-primary" href="<?php echo $href; ?>"><?php echo $button; ?></a>
    </div>
    </div>
  </div>

  <?php $i++; endwhile; ?>
</div>
<?php endif; ?>