<?php
/**
 * 
 * Creates a shortcode that powers 
 * a psuedo staff archive page
 * [zba-staff]
 * 
 */

if ( ! defined( 'ABSPATH' ) ){
  exit;
}

add_shortcode('zba-staff', 'get_active_zba_staff');
function get_active_zba_staff( $atts ) {

  $args = array(
    'post_type' => 'team_member',
    'numberposts' => -1,
    'post_status' => 'publish',
    'meta_query'     => [
        'last_name_clause'  => [
            'key'     => 'last_name',
            'compare' => 'EXISTS'
        ],
        'first_name_clause' => [
            'key'     => 'first_name',
            'compare' => 'EXISTS'
        ],
        'employment_status_clause' => [
            'key'     => 'employment_status',
            'value'   => 'active',
            'compare' => '='
        ]
    ],
    'orderby' => [
        'last_name_clause'  => 'ASC',
        'first_name_clause' => 'ASC',
    ],
  );
  $team_members = get_posts( $args );

  if( ! empty( $team_members ) ){

    ob_start();

    // Staff
    echo '<div class="staff team-wrapper">';
    foreach( $team_members as $team_member ){
      include('partials/single-team-member.php');
    }
    echo '</div>';

    $html = ob_get_contents();
    ob_end_clean();

    zba_register_staff_assets();
  }

  return $html;
}