<?php the_content(); ?>

<?php 

$providers = get_field('providers');

if( $providers ): ?>
    <ul id="providers">
    <?php foreach( $providers as $post) : setup_postdata($post); ?>
        <?php
          $provider_bio = get_field( 'provider_bio', $post->ID );
          $provider_photo = get_field( 'provider_photo', $post->ID );
          $provider_cv_download = get_field( 'provider_cv_download', $post->ID );
          $provider_video = get_field( 'provider_video', $post->ID );
          $slug = sanitize_title( get_the_title() );
        ?>
        <li id="<?php echo $slug; ?>" class="row">
          <div class="col-sm-2">
            <img src="<?php echo $provider_photo['sizes']['thumbnail']; ?>" alt="" />
          </div>
          <div class="col-sm-6">
            <div class="title"><h2 class="short-underline fuschia"><?php the_title(); ?></h2></div>
            <?php echo $provider_bio; ?>
            <div class="text-left">
              <?php if ( $provider_cv_download ) : ?>
                <a class="btn btn-primary provider-btn" href="<?php echo $provider_cv_download['url']; ?>">Download CV <i class="fa fa-download pull-right"></i></a>
              <?php endif; ?>
            </div>
          </div>
          <div class="col-sm-4">
            <?php if ( $provider_video ) : ?>
              <h4>Meet <?php the_title(); ?></h4>
              <div class="embed-responsive embed-responsive-16by9">
                <?php echo wp_oembed_get( $provider_video, array() ); ?>
              </div>
            <?php endif; ?>
          </div>
        </li>
    <?php endforeach; ?>
    </ul>
    <?php wp_reset_postdata(); ?>
<?php endif; ?>

<?php get_template_part( 'templates/parts/expandable_list' ); ?>
<?php //wp_link_pages(array('before' => '<nav class="pagination">', 'after' => '</nav>')); ?>