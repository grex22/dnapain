<?php
/*
Template Name: Payment Complete Template
*/
?>

<?php while ( have_posts() ) : the_post(); ?>
  <?php //get_template_part('templates/page', 'header'); ?>
  <?php get_template_part('templates/content', 'payment-complete'); ?>
<?php endwhile; ?>
