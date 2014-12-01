<footer class="content-info" role="contentinfo">

  	<div class="container">

  		<div class="row">

	  		<div class="col-md-4">

			<?php

				if (has_nav_menu('footer_navigation')) :
				  wp_nav_menu(
				  	array(
				  		'theme_location' 	=> 'footer_navigation',
				  		'menu_class'		=> 'row',
				  		'walker' 			=> new Walker_Nav_Menu
				  	)
				  );
				endif;

			?>

			</div>

			<div class="col-md-4 locations">

				<ul class="row">

					<h6>Our Locations</h6>

					<li class="col-md-6">West Miffin, PA
					<span>123-123-1234</span>
					123 Test St., Test City, PA</li>

					<li class="col-md-6">West Miffin, PA
					<span>123-123-1234</span>
					123 Test St., Test City, PA</li>

					<li class="col-md-6">West Miffin, PA
					<span>123-123-1234</span>
					123 Test St., Test City, PA</li>

					<li class="col-md-6">West Miffin, PA
					<span>123-123-1234</span>
					123 Test St., Test City, PA</li>

					<li class="col-md-6">West Miffin, PA
					<span>123-123-1234</span>
					123 Test St., Test City, PA</li>

					<li class="col-md-6">West Miffin, PA
					<span>123-123-1234</span>
					123 Test St., Test City, PA</li>

					<li class="col-md-6">West Miffin, PA
					<span>123-123-1234</span>
					123 Test St., Test City, PA</li>

				</ul>

			</div>

			<div class="col-md-3 col-md-offset-1 additional-info">

				<h6>Additional Information</h6>

				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam sed lectus venenatis, suscipit urna a, consectetur lorem.</p>

				<a class="btn btn-primary" href="#">Patient Portal <i class="fa fa-arrow-right"></i></a>

				<a class="btn btn-primary" href="#">Employee Portal <i class="fa fa-arrow-right"></i></a>

				<div class="">

					<a href="#" target="_blank">
						<span class="fa-stack fa-lg">
						  <i class="fa fa-circle fa-stack-2x"></i>
						  <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
						</span>
					</a>

					<a href="#" target="_blank">
						<span class="fa-stack fa-lg">
						  <i class="fa fa-circle fa-stack-2x"></i>
						  <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
						</span>
					</a>

					<a href="#" target="_blank">
						<span class="fa-stack fa-lg">
						  <i class="fa fa-circle fa-stack-2x"></i>
						  <i class="fa fa-google-plus fa-stack-1x fa-inverse"></i>
						</span>
					</a>

				</div>

			</div>

		</div>

	</div>

</footer>
