<?php
/*
Plugin Name: Person CPT
Description: This plugin is for custom post type, custom meta box, it's short-code and for widget creation.
Version: 1.0.0
Author: Navanath Bhosale
Author URI: https://profiles.wordpress.org/navanathb
*/

define( 'NB_PLUGIN', __FILE__ );

define( 'NB_PLUGIN_DIR', untrailingslashit( dirname( NB_PLUGIN ) ) );

define( 'NB_PLUGIN_URL', untrailingslashit( plugins_url( '', NB_PLUGIN ) ) );

require_once NB_PLUGIN_DIR . '/loader.php';