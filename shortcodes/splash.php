<?php
/**
 * 
 * Shortcode for a large rotating, featured image splash section.
 * Designed for the home page.
 * 
 */
add_shortcode('zba-splash', 'render_zba_featured_project_splash');
function render_zba_featured_project_splash(){
  $options = get_option( 'zba_options', []);
  $image_ids = ( array_key_exists('zba_splash_image_ids', $options) ) ? array_values( array_filter( $options['zba_splash_image_ids'] ) ) : [143]; // fallback image of sugihara

  include('partials/splash-main.php');

  zba_enqueue_splash_assets();
}