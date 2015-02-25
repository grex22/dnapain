<?php the_content(); ?>

<?php
$test_mode = true; // true = test mode, false = production
	
if($test_mode):
	$post_url = 'https://securepaymentstest.cardconnect.com/hpp/payment/';
	$ccid = "I2iP4irvKDM8MMN/RUnJY3cZn+tYF7arGdXVfzxeCESnFOsajsIcBEejW2tGwpzich5BTnLQ/lsAmzHlxh0X1efWqiyrKLe/jyZRWrcauMcwgNHhauIriWTxDvhIbJ2Fq6thni9sogy44RHvtV65KU23ghVjx6bzQ1ew4aFclbo=";
else:
	$post_url = 'https://securepayments.cardconnect.com/hpp/payment/';
	$ccid = "cvOKhVtJeFUH347D7XXL/tWymEyFjvsFYmhYgbnNBeBUgzLYGnv6Y6TP2jKRULLmUXeG+HrMAdP1L2Gfs8pT4L9snUzhuuePJTassZvgqTAJPhAWWYkiyMXo6mraHwDWjVucKxuhqDn9yuuuVboJ8RvkjL3nIHqqoWBLssWY2XE=";
	
endif;

?>
<hr>
<form action="<?php echo $post_url; ?>" method="post" target="_blank">
  <input type="hidden" name="ccId" value="<?php echo $ccid; ?>" />  
  <input type="hidden" name="ccSite" value="fts">
  <input type="hidden" name="ccPostbackUrl" value="http://dnapain.com/thank-you/">
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