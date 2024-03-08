<?php
/**
 * Plugin Name:       RioVizual
 * Plugin URI:        https://riovizual.com/
 * Description:       Drag-and-drop Gutenberg table block plugin for WordPress to effortlessly create customizable & responsive tables that convert exceptionally well.
 * Requires at least: 6.1
 * Requires PHP:      7.0
 * Version:           2.0.4
 * Author:            wprio
 * Author URI:        https://riovizual.com/
 * License:           GPL-3.0
 * License URI:       https://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain:       riovizual
 *
 * @package           riovizual
 */

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */

// Defines constent.
define( 'RIO_VIZUAL_VERSION', '2.0.4' );
define( 'RIO_VIZUAL_TEXT_DOMAIN', 'riovizual' );

define( 'RIO_VIZUAL_PATH', plugin_dir_path( __FILE__ ) );
define( 'RIO_VIZUAL_INC_PATH', plugin_dir_path( __FILE__ ) . '/includes' );

define( 'RIO_VIZUAL_BUILD_DIR', dirname( __FILE__ ) . '/build' );
define( 'RIO_VIZUAL_BUILD_URL', plugin_dir_url( __FILE__ ) . 'build' );

define( 'RIO_VIZUAL_CORE_URL', plugin_dir_url( __FILE__ ) . 'core' );

require_once RIO_VIZUAL_INC_PATH . '/class-rio-viz-init.php';

/**
 * Uninstallation process
 */
function rio_viz_uninstall() {

	// Delete css from post meta.
	delete_metadata( 'post', 0, '_rio_vizual_css', '', true );

	// Delete css and font from option.
	$all_options = wp_load_alloptions();

	foreach ( $all_options as $name => $value ) {
		if ( str_starts_with( $name, '_rio_vizual_' ) ) {
			delete_option( $name );
		}
	}
}
register_uninstall_hook( __FILE__, 'rio_viz_uninstall' );

// run the init method.
new Rio_Viz_Init();

