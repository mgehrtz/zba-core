<?php
/**
* 
* Generate post title and post slug from ACF single value fields
*
*/

add_action('acf/save_post', 'zba_update_team_member_post_title', 20);
//Auto add and update Title field:
function zba_update_team_member_post_title( $post_id ) {
  if ( get_post_type( $post_id ) !== 'team_member' ) return;

  $post_title = get_field('first_name', $post_id ) . ' ' . get_field('last_name', $post_id );

  $post = array();
  $post['ID'] = $post_id;
  $post['post_title'] = $post_title;
  $post['post_name'] = sanitize_title( $post_title );

  // Update the post into the database
  wp_update_post( $post );
}
