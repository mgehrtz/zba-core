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
    $html .= '<p style="text-align: center; max-width: 1000px; padding: 1rem; margin: 0 auto;">We are not actively hiring at the moment, but we are always interested in connecting with talented individuals who are passionate about architecture and design. If you would like to submit a general application, please send your resume and cover letter to <a href="mailto:careers@zbaarch.com">careers@zbaarch.com</a>. We will keep your information on file and reach out if a suitable opportunity arises.</p>';
  }

  $html .= '</div>';

  zba_enqueue_job_listing_assets();

  return $html;
}