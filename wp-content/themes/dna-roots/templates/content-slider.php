<?php ?>

<div id="carousel" class="carousel slide carousel-fade" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel" data-slide-to="0" class="active"></li>
    <li data-target="#carousel" data-slide-to="1"></li>
    <li data-target="#carousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="<?php bloginfo('stylesheet_directory'); ?>/assets/img/banner/dna-slide_1.jpg">
      <div class="carousel-caption">
        <h3>Pain doesn’t have to be part of your daily routine.</h3>
        <button type="button" class="btn btn-primary" href="#">Schedule an appointment today</button>
      </div>
    </div>
    <div class="item">
      <img src="<?php bloginfo('stylesheet_directory'); ?>/assets/img/banner/dna-slide_2.jpg">
      <div class="carousel-caption">
        <h3>Six convenient locations. Peace of mind is close to home.</h3>
        <button type="button" class="btn btn-primary" href="#">Our Locations</button>
      </div>
    </div>
    <div class="item">
      <img src="<?php bloginfo('stylesheet_directory'); ?>/assets/img/banner/dna-slide_3.jpg">
      <div class="carousel-caption">
      	<h3>Focusing on the entire patient experience.</h3>
        <button type="button" class="btn btn-primary" href="#">Learn about our physicians</button>
      </div>
    </div>
  </div>
</div>