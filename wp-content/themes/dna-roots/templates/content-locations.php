<?php the_content(); ?>

<?php 

$providers = get_field('locations');

if( $providers ): ?>
    <ul id="providers">
    <?php foreach( $providers as $post) : setup_postdata($post); ?>
        <?php
        ?>
        <li id="<?php echo $slug; ?>" class="row">

          <div class="col-sm-2">
          </div>

          <div class="col-sm-6">
            Locations Page Row
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