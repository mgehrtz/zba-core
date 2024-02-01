<?php
/**
 * 
 * Register a menu link for options page
 * 
 */
add_action( 'admin_init', 'zba_options_init');
function zba_options_init(){
  register_setting( 'zba_core', 'zba_options' );

  add_settings_section(
    'zba_home_carousel',
    __( 'Homepage Featured Project Images', 'zba' ),
    'render_zba_home_carousel_section',
    'zba-home-carousel'
  );

  add_settings_field(
    'zba_home_images',
    __( 'Homepage Splash Images', 'zba'),
    'render_zba_home_images_field',
    'zba-home-carousel',
    'zba_home_carousel',
    array(
      'label_for' => 'zba_splash_image_ids',
      'class' => 'zba-home-images-settings'
    )
  );
}

function render_zba_home_carousel_section(){
  echo '<p>Here you can select the images that are available for the home page splash section.</p><p>Keep in mind that too many selected images will clutter the splash section. Try to limit it to <strong>5 images</strong></p>';
}

function render_zba_home_images_field( $args ){
  $options = get_option( 'zba_options', []);
  $image_ids = ( array_key_exists('zba_splash_image_ids', $options) ) ? $options['zba_splash_image_ids'] : [];
  include('views/zba-select-gallery-images-field.php');
}

add_action( 'admin_menu', 'zba_options_menu');
function zba_options_menu(){
  add_menu_page(
    'ZBA Options',
    'ZBA Settings',
    'manage_options',
    'zba-core',
    'render_zba_options_page',
    'dashicons-admin-generic',
    5
  );
}
function render_zba_options_page(){
  if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}

	if ( isset( $_GET['settings-updated'] ) ) {
		// add settings saved message with the class of "updated"
		add_settings_error( 'zba_messages', 'zba_message', __( 'Settings Saved', 'zba' ), 'updated' );
	}

	// show error/update messages
	settings_errors( 'zba_messages' );

  include('views/zba-options.php');
}