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

		  $locarray = array();
		  $locationsorder = get_field('locations_order','option');
		  
		  echo "<h6>Our Locations</h6>";
		  foreach($locationsorder as $post):
		  	setup_postdata($post);
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

		  endforeach;
		  $rowsloc = array_chunk($locarray, 2);
		  foreach($rowsloc as $row){
			  foreach($row as $loc):
				  echo $loc;
			  endforeach;
			  echo "<div class='clearfix'></div>";
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
                
                <form target="_blank" style="margin:0;display:block" action="https://securepayments.cardconnect.com/hpp/payment/" method="post">
                  
                  <!-- 496160873888   -->
                  <input type="hidden" name="ccId" value="cvOKhVtJeFUH347D7XXL/tWymEyFjvsFYmhYgbnNBeBUgzLYGnv6Y6TP2jKRULLmUXeG+HrMAdP1L2Gfs8pT4L9snUzhuuePJTassZvgqTAJPhAWWYkiyMXo6mraHwDWjVucKxuhqDn9yuuuVboJ8RvkjL3nIHqqoWBLssWY2XE=" />       
                  <input type="hidden" name="ccSite" value="fts">
                  <input type="hidden" name="ccPostbackUrl" value="http://dnapain.com/thank-you/">
                  <button type="submit" name="submit" class="btn btn-primary footer-btn" style="width: 80%;margin-right: 20%;">Make a Payment <i class="fa fa-credit-card pull-right"></i></button>
                  
                </form>

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
