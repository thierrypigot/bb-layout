<?php
/**
 * Plugin Name: Beaver Builder - Layout Module
 * Plugin URI: http://www.thierry-pigot.fr
 * Description: Layout Module for Beaver Builder.
 * Version: 1.0
 * Author: Thierry Pigot
 * Author URI: http://www.thierry-pigot.fr
 */
 
define('FL_MODULE_LAYOUT_DIR', plugin_dir_path(__FILE__));
define('FL_MODULE_LAYOUT_URL', plugins_url('/', __FILE__));

/**
 * Load plugin textdomain.
 *
 * @since 1.0.0
 */
add_action('plugins_loaded', 'tp_bb_load_textdomain_layout');
function tp_bb_load_textdomain_layout()
{
	load_plugin_textdomain('bb-layout', false, dirname(plugin_basename(__FILE__)) . '/languages');
}


// Custom modules
function fl_load_module_layout() {
	if( class_exists('FLBuilder') ) {
		require_once 'includes/tp-bb-layout.php';
	}
}
add_action('init', 'fl_load_module_layout', 99);