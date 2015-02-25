<?php the_content(); ?>

<?php file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/log.txt', print_r($_POST, true)); ?>

<?php get_template_part( 'templates/parts/expandable_list' ); ?>