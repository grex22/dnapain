<?php
/**
 * Clean up the_excerpt()
 */
function roots_excerpt_more($more) {
  return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'roots') . '</a>';
}
add_filter('excerpt_more', 'roots_excerpt_more');

/**
 * Manage output of wp_title()
 */
function roots_wp_title($title) {
  if (is_feed()) {
    return $title;
  }

  $title .= get_bloginfo('name');

  return $title;
}
add_filter('wp_title', 'roots_wp_title', 10);


/**
 * Create custom base.php for the home page
 */
function roots_wrap_base_cpts( $templates ) {
  if ( ! is_front_page() ) {
    return $templates;
  }

  array_unshift($templates, 'base-home.php');

  return $templates;
}
add_filter('roots/wrap_base', 'roots_wrap_base_cpts');

/**
 * Allow uploading VCF (vcard) files
 */
function add_custom_mime_types($mimes){
  return array_merge($mimes,array (
    'vcf' => 'text/vcard'
  ));
}
add_filter('upload_mimes','add_custom_mime_types');


/**
 * Fix Gravity Form Tabindex Conflicts
 * http://gravitywiz.com/fix-gravity-form-tabindex-conflicts/
 */
add_filter( 'gform_tabindex', 'gform_tabindexer', 10, 2 );
function gform_tabindexer( $tab_index, $form = false ) {
    $starting_index = 1000; // if you need a higher tabindex, update this number
    if( $form )
        add_filter( 'gform_tabindex_' . $form['id'], 'gform_tabindexer' );
    return GFCommon::$tab_index >= $starting_index ? GFCommon::$tab_index : $starting_index;
}