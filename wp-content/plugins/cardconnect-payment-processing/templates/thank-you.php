<?php the_content(); ?>

<?php
$payment_details = json_decode( base64_decode( urldecode( $_GET['td'] ) ) );
?>

<hr />
<ul>
	<li>Transaction ID: <?php echo $payment_details->trans_id; ?></li>
	<li>Amount: <?php echo $payment_details->amount; ?></li>
	<li>Credit Card Number: <?php echo $payment_details->ccnum; ?></li>
	<li>Credit Card Exp: <?php echo $payment_details->ccexp; ?></li>
</ul>

<p>Please print this page for your records.</p>

<?php get_template_part( 'templates/parts/expandable_list' ); ?>
