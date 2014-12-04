<?php

  if( have_rows( 'slides' ) ) {

    $numslides = count ( get_field( 'slides' ) );
    $i = 0;

?>

<div id="carousel" class="carousel slide carousel-fade" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
<?php
  while ( $i <= $numslides - 1 ) {
?>
    <li data-target="#carousel" data-slide-to="<?php echo $i; ?>" class="<?php if($i == 0) echo 'active'; ?>"></li>
<?php
  $i++;
  }
?>
  </ol>

  <div class="carousel-inner" role="listbox">
<?php
    $i = 0;
    
    while ( have_rows( 'slides' ) ):
      the_row();
      $title    = get_sub_field( 'title' );
      $button   = get_sub_field( 'button' );
      $href     = get_sub_field( 'href' );
      $img      = get_sub_field( 'img' );

?>

  <!-- Wrapper for slides -->
    <div class="item <?php if( $i == 0 ) echo "active"; ?>">
      <img src="<?php echo $img; ?>">
      <div class="container">
      <div class="carousel-caption">
        <h3><?php echo $title; ?></h3>
        <a class="btn btn-primary" href="<?php echo $href; ?>"><?php echo $button; ?></a>
      </div>
      </div>
    </div>

<?php $i++; ?>
<?php endwhile; ?>
  </div>
</div>
<?php } ?>