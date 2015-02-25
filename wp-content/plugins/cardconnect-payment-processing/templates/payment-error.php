<?php the_content(); ?>

<hr />
<ul>
	<li>Reference ID: <?php echo isset( $_POST['retref'] ) ? $_POST['retref'] : 'N/A'; ?></li>
	<li>Error Code: <?php echo isset( $_POST['errorCode'] ) ? $_POST['errorCode'] : 'N/A'; ?></li>
	<li>Error: <?php echo isset( $_POST['errorDesc'] ) ? $_POST['errorDesc'] : 'N/A'; ?></li>
	<li>Amount: <?php echo isset( $_POST['amount'] ) ? $_POST['amount'] : 'N/A'; ?></li>
</ul>

<p>Please <a href="<?php echo home_url( '/contact-us/' ); ?>">contact us</a> if problems persists.</p>

<?php get_template_part( 'templates/parts/expandable_list' ); ?>
