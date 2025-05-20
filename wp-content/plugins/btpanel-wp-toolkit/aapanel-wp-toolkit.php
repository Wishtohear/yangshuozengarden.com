<?php
/**
 * Plugin Name:       aapanel WP Toolkit
 * Plugin URI:        https://www.aapanel.com/new/feature/wp.html
 * Description:       Allows you to manage Wordpress remotely on aapanel, one-click login, and some features will be coming in the future.
 * Version:           0.0.1
 * Author:            aapanel
 * Author URI:        https://www.aapanel.com/
 * Text Domain:       aapanel-wp-toolkit
 * Domain Path:       /languages
 * Requires at least: 3.0
 * Tested up to:      6.6.1
 * License: GPLv3
 *
 * @link              https://www.aapanel.com/
 * @since             0.0.1
 * @package           aapanel-wp-toolkit
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	exit();
}

/**
 * Base URL of plugin
 */
if ( ! defined( 'AAP_WP_TOOLKIT_BASEURL' ) ) {
	define( 'AAP_WP_TOOLKIT_BASEURL', plugin_dir_url( __FILE__ ) );
}

/**
 * Base Name of plugin
 */
if ( ! defined( 'AAP_WP_TOOLKIT_BASENAME' ) ) {
	define( 'AAP_WP_TOOLKIT_BASENAME', plugin_basename( __FILE__ ) );
}

/**
 * Base PATH of plugin
 */
if ( ! defined( 'AAP_WP_TOOLKIT_BASEPATH' ) ) {
	define( 'AAP_WP_TOOLKIT_BASEPATH', plugin_dir_path( __FILE__ ) );
}

require_once AAP_WP_TOOLKIT_BASEPATH . 'includes/class-aapanel-wp-toolkit.php';

register_activation_hook( __FILE__, ['aapanel_WP_Toolkit', 'activate'] );
register_deactivation_hook( __FILE__, ['aapanel_WP_Toolkit', 'deactivate'] );
register_uninstall_hook( __FILE__, ['aapanel_WP_Toolkit', 'uninstall'] );

if (!function_exists('run_aapanel_wp_toolkit')) {
	function run_aapanel_wp_toolkit() {
		global $aap_wp_toolkit;

		$aap_wp_toolkit = new aapanel_WP_Toolkit();
		$aap_wp_toolkit->run();
	}
}

run_aapanel_wp_toolkit();
