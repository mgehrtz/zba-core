<?php
/**
 * 
 * Fetch all posts with type of 'job_listing'
 * [zba-jobs]
 * 
 */

 add_shortcode('zba-jobs', 'get_zba_job_listings');
 function get_zba_job_listings( $atts ){

  // Filter atts
  $atts = shortcode_atts(array(
    "qty" => -1
  ), $atts);

  // Setup query args
  $args = array(
    'post_type' => 'job_listing',
    'numberposts' => $atts['qty'],
    'post_status' => 'publish'
  );

  $jobs = get_posts( $args );

  $html = '<div class="jobs-wrapper">';
  if( $jobs ){

    ob_start();

    foreach ( $jobs as $job ) {
      include('partials/single-job-listing.php');
    }

    $html .= ob_get_contents();
    ob_end_clean();

  // No Jobs
  } else {
    $html .= '<p>There are no open positions at this time. Please check back again soon!</p>';
  }

  $html .= '</div>';

  zba_enqueue_job_listing_assets();

  return $html;
}