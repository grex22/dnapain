<?php the_content(); ?>
<?php if(is_page(38)): ?>
    <?php
		if ( false === ( $results = get_transient( 'viewmedica_results' ) ) ):
			$results = file_get_contents('https://swarminteractive.com/vm/api/video/?key=14a36a3db37c2389275daad73df8abbdfe17a427&client=2713&taxonomy=false&description=true');
			$results = json_decode($results);
			set_transient( 'viewmedica_results', $results, 12 * HOUR_IN_SECONDS );
			
		endif;
    	
		if($results):
			$conditionresults = "<hr><h3>Conditions:</h3><ul id='viewmedica_list' class='list-unstyled'>";
			$procedureresults = "<hr><h3>Procedures:</h3><ul id='viewmedica_list' class='list-unstyled'>";
			
			$conditionvidids = array("A_0b960283","A_348389cb","A_cf8e66d4","A_fe8bc29e","A_6eec4f81","A_3d33fe1c","A_5bba0730","A_e40d73e3","A_c99a0ca2","A_98cd8947","A_dc1e0d63","A_7a0c1376","A_cc38fa69","A_f06e0a57","A_02e89cf2");
						
			foreach($results as $key => $r):
			
				$resultcontent = "
					<li>
					<div class='media'>
					  <a class='media-left' onClick='_vm.navigate\"". $key ."\");' href='#' style='width:120px;'>
						<img width='120' class='img-thumbnail' src='http://www.swarminteractive.com/images/thumbs/".$r->file."_120.jpg'>
					  </a>
					  <div class='media-body'>
						<h4 class='media-heading'><a href='#' onClick='_vm.navigate(\"". $key . "\")'>". $r->label."</a></h4>
						<p>". $r->description->en."</p>
					  </div>
					</div>
					</li>
				";
				
				if(in_array($key,$conditionvidids)):
					$conditionresults .= $resultcontent;
				else:
					$procedureresults .= $resultcontent;
				endif;

			endforeach;
			$conditionresults .= "</ul>";
			$procedureresults .= "</ul>";
			
			echo $conditionresults;
			echo $procedureresults;
		else:
			echo "<p>We're sorry, we couldn't load the patient education library at this time. Please try again in a few moments.</p>";
		endif;
		
	?>
<?php endif; ?>
<?php get_template_part( 'templates/parts/expandable_list' ); ?>
<?php //wp_link_pages(array('before' => '<nav class="pagination">', 'after' => '</nav>')); ?>