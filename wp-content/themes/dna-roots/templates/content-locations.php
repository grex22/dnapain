<?php the_content(); ?>

TEST CONTENT, GREG YOU CAN REMOVE ME

<?php 

$locations = get_field('locations');

if( $locations ): ?>
    <ul id="locations">
    <?php foreach( $locations as $post) : setup_postdata($post); ?>
        <?php
        ?>
        <li class="row">

          <div class="col-sm-2">
          </div>

          <div class="col-sm-6">
          </div>

          <div class="col-sm-4">
          </div>

        </li>
    <?php endforeach; ?>
    </ul>
    <?php wp_reset_postdata(); ?>
<?php endif; ?>

<?php get_template_part( 'templates/parts/expandable_list' ); ?>
<?php //wp_link_pages(array('before' => '<nav class="pagination">', 'after' => '</nav>')); ?>