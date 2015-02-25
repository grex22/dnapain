<?php the_content(); ?>

<?php
$payment_details = json_decode( base64_decode( urldecode( $_GET['td'] ) ) );
?>

<hr />
<ul>
	<li>Reference ID: <?php echo $payment_details->trans_id; ?></li>
	<li>Error Code: <?php echo $payment_details->errorcode; ?></li>
	<li>Error: <?php echo $payment_details->errordesc; ?></li>
	<li>Amount: <?php echo $payment_details->amount; ?></li>
</ul>

<p><a href="<?php echo home_url( '/make-a-payment/' ); ?>">Try Again</a></p>
<p>Please <a href="<?php echo home_url( '/contact-us/' ); ?>">contact us</a> if problems persists.</p>

<?php get_template_part( 'templates/parts/expandable_list' ); ?>
