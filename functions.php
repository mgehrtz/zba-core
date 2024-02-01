<?php
/**
 * 
 * Defines functions used throughout the plugin
 * 
 */
// Carousel of projects on home page
function register_project_carousel_assets(){
  zba_slick_slider_assets();
  wp_enqueue_style(
    'zba_project_carousel_css',
    ZBA_PLUGIN_ROOT . 'src/css/zba-project-carousel.css',
    [],
    '1.0',
    'all'
  );
  wp_enqueue_script(
    'zba_project_carousel_js',
    ZBA_PLUGIN_ROOT . 'src/js/zba-project-carousel.js',
    ['jquery'],
    '1.0',
    true
  );
}

// Project Grid
function register_project_grid_assets(){
  wp_enqueue_style(
    'zba_project_grid_css',
    ZBA_PLUGIN_ROOT . 'src/css/zba-project-grid.css',
    [],
    '1.0',
    'all'
  );
  wp_enqueue_script(
    'zba_project_grid_js',
    ZBA_PLUGIN_ROOT . 'src/js/zba-project-grid.js',
    ['jquery'],
    '1.0',
    true
  );
}

// Slick slider assets
function zba_slick_slider_assets(){
  wp_enqueue_style(
    'zba_slick_slider_css',
    ZBA_PLUGIN_ROOT . 'src/vendor/slick-slider/slick.css',
    [],
    '2.7',
    'all'
  );
  wp_enqueue_style(
    'zba_slick_slider_css-theme',
    ZBA_PLUGIN_ROOT . 'src/vendor/slick-slider/slick-theme.css',
    [],
    '2.7',
    'all'
  );
  wp_enqueue_script(
    'zba_slick_slider',
    ZBA_PLUGIN_ROOT . 'src/vendor/slick-slider/slick.min.js',
    ['jquery'],
    '2.7',
    true
  );
}

function zba_lightbox_assets(){
  wp_enqueue_style(
    'zba_lightbox2_css',
    ZBA_PLUGIN_ROOT . 'src/vendor/lightbox2/dist/css/lightbox.min.css',
    [],
    '1.0',
    'all'
  );
  wp_enqueue_script(
    'zba_lightbox2_js',
    ZBA_PLUGIN_ROOT . 'src/vendor/lightbox2/dist/js/lightbox.min.js',
    ['jquery'],
    '1.0',
    true
  );
}

function zba_register_staff_assets(){
  wp_enqueue_style(
    'zba_staff_css',
    ZBA_PLUGIN_ROOT . 'src/css/zba-team-members.css',
    [],
    '1.0',
    'all'
  );
}

function zba_get_chevron_btn( $direction ){
  if ( $direction === 'left' ) {
    $label = 'Previous';
    include('shortcodes/partials/button-with-chevron.php');
  }
  if ( $direction === 'right'){
    $label = 'Next';
    include('shortcodes/partials/button-with-chevron.php');
  }
}

function zba_get_fullscreen_button(){
  include('shortcodes/partials/carousel-fullscreen-button.php');
}

function zba_enqueue_splash_assets(){
  wp_enqueue_style(
    'zba_splash_css',
    ZBA_PLUGIN_ROOT . 'src/css/zba-splash.css',
    [],
    '1.0',
    'all'
  );

  wp_enqueue_script(
    'zba_splash_js',
    ZBA_PLUGIN_ROOT . 'src/js/zba-splash.js',
    ['jquery'],
    '1.0',
    true
  );
}

function zba_enqueue_project_types_assets($style){
  if($style === 'default'){
    wp_enqueue_style(
      'zba_project_types_css',
      ZBA_PLUGIN_ROOT . 'src/css/zba-project-types.css',
      [],
      '1.0',
      'all'
    );
    return;
  }
  if($style === 'minimal'){
    wp_enqueue_style(
      'zba_project_types_css',
      ZBA_PLUGIN_ROOT . 'src/css/zba-project-types-minimal.css',
      [],
      '1.0',
      'all'
    );
  }

}

function zba_enqueue_job_listing_assets(){
  wp_enqueue_style(
    'zba_careers_css',
    ZBA_PLUGIN_ROOT . 'src/css/zba-careers.css',
    [],
    '1.0',
    'all'
  );

  wp_enqueue_script(
    'zba_careers_js',
    ZBA_PLUGIN_ROOT . 'src/js/zba-careers.js',
    ['jquery'],
    '1.0',
    true
  );
}

add_action( 'admin_enqueue_scripts', 'zba_home_options_js' );
function zba_home_options_js() {
	
	// I recommend to add additional conditions here
	// because we probably do not need the scripts on every admin page, right?
	
	// WordPress media uploader scripts
	if ( ! did_action( 'wp_enqueue_media' ) ) {
		wp_enqueue_media();
	}
	// our custom JS
 	wp_enqueue_script( 
		'zba_home_options_js', 
		ZBA_PLUGIN_ROOT . 'admin/js/zba-options_home-images.js',
		array( 'jquery' )
	);

  wp_enqueue_style(
    'zba_home_options_css',
    ZBA_PLUGIN_ROOT . 'admin/css/zba-options_home-images.css',
    [],
    '1.0',
    'all'
  );
}