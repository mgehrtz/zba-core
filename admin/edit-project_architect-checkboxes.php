<?php
/**
 * Load all architects from the Staff post type 
 * and populate choices for checkboxes for project
 * leading architects section
 * 
 * Advanced Custom Fields is required
 * 
 */
function acf_load_architect_checkboxes( $field ) {
  // Get staff
  $args = array(
    'numberposts' => -1,
    'post_type' => 'team_member',
    'post_status' => 'publish',
    'orderby' => 'title',
    'order' => 'ASC',
    'meta_key' => 'zba_design_team',
    'meta_value' => 1,
    'meta_compare' => '='
  );
  $architects = get_posts( $args );

  // Add to checkbox options
  if( ! empty( $architects ) ){
    $field['choices'] = array();
    foreach ( $architects as $architect ){
      $id = $architect->ID;
      $name = $architect->post_title;
      $field['choices'][ $id ] = $name;
    }
  }
  
  // return the field
  return $field;
}
add_filter('acf/load_field/name=leading_architects', 'acf_load_architect_checkboxes');