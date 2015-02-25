<?php the_content(); ?>

<hr />
<ul>
	<li>Transaction ID: <?php echo isset( $_POST['retref'] ) ? $_POST['retref'] : 'N/A'; ?></li>
	<li>Amount: <?php echo isset( $_POST['amount'] ) ? $_POST['amount'] : 'N/A'; ?></li>
	<li>Credit Card Number: <?php echo isset( $_POST['masked'] ) ? $_POST['masked'] : 'N/A'; ?></li>
	<li>Credit Card Exp: <?php echo isset( $_POST['expiry'] ) ? $_POST['expiry'] : 'N/A'; ?></li>
</ul>

<p>Please print this page for your records.</p>

<?php get_template_part( 'templates/parts/expandable_list' ); ?>
