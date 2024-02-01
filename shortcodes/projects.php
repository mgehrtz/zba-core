<?php
/**
 * 
 * Fetch all posts with type of 'project'
 * [zba-projects]
 * 
 */

 add_shortcode('zba-projects', 'get_zba_projects');
 function get_zba_projects( $atts ){

  // Filter atts
  $atts = shortcode_atts(array(
    "style" => "grid",
    "qty" => -1
  ), $atts);

  // Setup query args
  $args = array(
    'post_type' => 'project',
    'numberposts' => $atts['qty'],
    'post_status' => 'publish'
  );

  // get projects
  $projects = get_posts( $args );
  shuffle($projects); // rondomize

  if( ! empty($projects) ){

    // Carousel
    if( $atts['style'] === 'carousel'){

      ob_start();
      echo '<div class="project-carousel-wrapper">';

      foreach( $projects as $project ){
        $project_img = get_the_post_thumbnail_url($project->ID, 'large');
        include('partials/project-carousel-item.php');
      }

      include('partials/project-carousel-nav.php');

      echo '</div>';
      $html = ob_get_contents();
      ob_end_clean();

      register_project_carousel_assets();
      return $html;

    // Grid
    } elseif ( $atts['style'] === 'grid'){

      ob_start();
      echo '<div class="project-grid-wrapper">';

      foreach( $projects as $project ){
        $project_img = get_the_post_thumbnail_url($project->ID, 'large');
        include('partials/project-grid-item.php');
      }

      echo '</div>';
      echo '<div class="loader-wrapper" style="display: none">';
      echo file_get_contents(ZBA_PLUGIN_ROOT . 'assets/icons/loader.svg');
      echo '</div>';

      $html = ob_get_contents();
      ob_end_clean();

      register_project_grid_assets();
      return $html;

    }
  }

  return 'There are no projects to display.';
 }