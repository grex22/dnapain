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
				<?php 
          $args=array(
            'post_type' => 'locations',
            'posts_per_page' => -1);
          $locationsq = new WP_Query($args);
		  $locarray = array();

          if( $locationsq->have_posts() ) { ?>
            <h6>Our Locations</h6><?php
            while ($locationsq->have_posts()) : $locationsq->the_post();
            $phone = get_field('phone');
            $fax = get_field('fax');
			$locarray[] =
		  	"
              <li class='col-xs-6 clinic-address'>

                    <div><strong>". $post->post_title ."</strong></div>
                    <div>" .get_field('clinic_address')."</div>
                    <div>Ph: ". $phone ."</div>
    
                </li>
              ";
            endwhile;
			$rowsloc = array_chunk($locarray, 2);
			foreach($rowsloc as $row){
				foreach($row as $loc):
					echo $loc;
				endforeach;
				echo "<div class='clearfix'></div>";
			}
          }
          wp_reset_query();
          ?>
    

				</ul>

			</div>

			<div class="col-md-3 col-md-offset-1 additional-info">

				<h6>Additional Information</h6>

				<p></p>

				<a class="btn btn-primary footer-btn" href="https://dnapain.followmyhealth.com/Login/Home/Index?authproviders=0&returnArea=PatientAccess" target="_blank">Patient Portal <i class="fa fa-arrow-right pull-right"></i></a>

				<a class="btn btn-primary footer-btn" href="http://employee.dnapain.com/" target="_blank">Employee Portal <i class="fa fa-arrow-right pull-right"></i></a>

				<div>

					<!--<a href="#" target="_blank">
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
					</a>-->

					<a href="https://www.youtube.com/channel/UCqLUN7PNQEcClqJKYHI8iSA" target="_blank">
						<span class="fa-stack fa-lg">
						  <i class="fa fa-circle fa-stack-2x"></i>
						  <i class="fa fa-youtube fa-stack-1x fa-inverse"></i>
						</span>
					</a>

				</div>

			</div>

		</div>

	</div>

</footer>
