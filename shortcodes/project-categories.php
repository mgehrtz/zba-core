<?php
/**
 * 
 * Show all the categories in 'project_types'
 * 
 */
add_shortcode('zba-project-categories', 'zba_render_categories');
function zba_render_categories( $atts ){
  $atts = shortcode_atts(array(
    'style' => 'default',
  ), $atts);

  $project_types = get_terms([
    'taxonomy' => 'project_type',
    'hide_empty' => true
  ]);

  if( ! $project_types ) return '';

  ob_start();
  echo '<div class="project-categories-wrapper">';

  $project_type = (object) [
    'slug' => '',
    'name' => 'All',
    'term_id' => '-1'
  ];
  include('partials/individual-project-type.php');

  foreach ( $project_types as $project_type) {
    $image = get_field('background_image', $project_type );
    $image_url = ( $image ) ? wp_get_attachment_image_url( $image['id'], 'medium' ) : "";

    include('partials/individual-project-type.php');
  }
  echo '</div>';
  $html = ob_get_contents();
  ob_end_clean();

  zba_enqueue_project_types_assets($atts['style']);
  return $html;
}