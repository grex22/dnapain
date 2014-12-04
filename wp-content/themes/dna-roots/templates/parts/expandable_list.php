<?php
// check if the repeater field has rows of data
if( have_rows('expandable_item') ): ?>
  <?php $listtitle = get_field('list_title'); ?>
  <?php if($listtitle): ?>
    <h2><?php echo $listtitle; ?></h2>
    <hr>
  <?php endif; ?>
  <div class="panel-group dna-panel" id="accordion" role="tablist" aria-multiselectable="true">
  <?php
  $i = 1;
  $openfirst = get_field('first_open');
 	// loop through the rows of data
    while ( have_rows('expandable_item') ) : the_row(); ?>
    <div class="panel panel-default">
      <div class="panel-heading<?php if(get_sub_field('highlight_this_item')) echo " highlighted"; ?>" role="tab" id="heading<?php echo $i; ?>">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $i; ?>" aria-expanded="true" aria-controls="collapse<?php echo $i; ?>" class="<?php if(!($i==1 && $openfirst)) echo "collapsed"; ?>">
            <?php the_sub_field('item_title'); ?>
          </a>
        </h4>
      </div>
      <div id="collapse<?php echo $i; ?>" class="panel-collapse collapse<?php if($i==1 && $openfirst) echo " in"; ?>" role="tabpanel" aria-labelledby="heading<?php echo $i; ?>">
        <div class="panel-body">
          <?php the_sub_field('item_content'); ?>
        </div>
      </div>
    </div>
    <?php
    $i++;
    endwhile;
    ?>
    </div>
<?php
else :

    // no rows found

endif;