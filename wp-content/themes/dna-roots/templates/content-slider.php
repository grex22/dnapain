<?php

  if( have_rows( 'slides' ) ) {

    $count = count ( get_field( 'slides' ) ) - 1;

?>

<div id="carousel" class="carousel slide carousel-fade" data-ride="carousel">

  <!-- Indicators -->

  <ol class="carousel-indicators">

<?php

  while ( $count >= 0 ) {

?>

    <li data-target="#carousel" data-slide-to="<?php echo $count; ?>" class="<?php echo !$count ? 'active' : ''; ?>"></li>

<?php

  $count--;

  }

?>

  </ol>

<?php

    while ( have_rows( 'slides' ) ) {

      the_row();

      $title    = get_sub_field( 'title' );
      $button   = get_sub_field( 'button' );
      $href     = get_sub_field( 'href' );
      $img      = get_sub_field( 'img' );

?>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">

    <div class="item active">

      <img src="<?php echo $img; ?>">

      <div class="carousel-caption">

        <h3><?php echo $title; ?></h3>

        <button type="button" class="btn btn-primary" href="<?php echo $href; ?>"><?php echo $button; ?></button>

      </div>

    </div>

  </div>

</div>

<?php

    }

  }

?>