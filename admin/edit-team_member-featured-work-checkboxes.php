<?php
/**
 * Load all projects where team member is leading architect 
 * and populate choices for checkboxes for architect
 * featured work section.
 * 
 * Advanced Custom Fields is required
 * 
 */
function acf_load_featured_work_checkboxes( $field ) {
  // Get staff
  $args = array(
    'numberposts' => -1,
    'post_type' => 'project',
    'post_status' => 'publish',
    'orderby' => 'title',
    'order' => 'ASC'
  );
  $projects = get_posts( $args );

  // Add to checkbox options
  if( ! empty( $projects ) ){
    $field['choices'] = array();
    foreach ( $projects as $project ){
      $id = $project->ID;
      $title = $project->post_title;
      $field['choices'][ $id ] = $title;
    }
  }
  
  // return the field
  return $field;
}
add_filter('acf/load_field/name=featured_work', 'acf_load_featured_work_checkboxes');