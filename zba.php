<?php
/**
 * 
 * Plugin Name: Zerr Berg Architects - Core
 * Description: A plugin that powers custom functionality to the Zerr Berg Architects website.
 * Version: 1.1.0
 *
 */

 define('ZBA_PLUGIN_ROOT', plugins_url('/', __FILE__) );
 include('functions.php');

 // Admin Functionality
include('admin/edit-project_gallery-metabox.php');
include('admin/edit-project_architect-checkboxes.php');
include('admin/edit-team_member-featured-work-checkboxes.php');
include('admin/save-team_member.php');
include('admin/zba-options-menu.php');

// Shortcodes
include('shortcodes.php');