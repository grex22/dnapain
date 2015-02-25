<?php the_content(); ?>

<hr />
<form action="<?php echo CCPP_POST_URL; ?>" method="post" target="_blank">
	<input type="hidden" name="ccId" value="<?php echo CCPP_ID; ?>" />  
	<input type="hidden" name="ccSite" value="fts">
	<input type="hidden" name="ccPostbackUrl" value="<?php echo CCPP_SUCCESS_URL; ?>">
	<div class="form-group">
		<label>Full Name (as it appears on your credit card)</label>
		<input type="text" class="form-control input-lg" name="ccName">
	</div>
	<div class="form-group">
		<label>Payment Amount</label>
		<div class="input-group">
			<div class="input-group-addon">$</div>
			<input type="text" class="form-control input-lg" name="ccAmount">
		</div>
	</div>
	<button type="submit" name="submit" class="btn btn-primary btn-lg"><i class="fa fa-credit-card"></i> Make a Payment</button>	  
</form>

<?php get_template_part( 'templates/parts/expandable_list' ); ?>