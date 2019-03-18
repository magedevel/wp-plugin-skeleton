<?php
/**
 * Uninstaller Class.
 *
 * @since   0.1.0
 *
 * @package DTG\Plugin_Name
 */

namespace DTG\Plugin_Name;

// Abort if this file is called directly.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Class Uninstaller
 *
 * Carry out actions when the plugin is uninstalled.
 *
 * @since       0.1.0
 *
 * @package DTG\Plugin_Name
 */
class Uninstaller {

	/**
	 * Path to the root plugin file.
	 *
	 * @var     string
	 * @access  private
	 * @since   0.1.0
	 */
	private $plugin_root;

	/**
	 * Plugin name.
	 *
	 * @var     string
	 * @access  private
	 * @since   0.1.0
	 */
	private $plugin_name;

	/**
	 * Plugin slug.
	 *
	 * @var     string
	 * @access  private
	 * @since   0.1.0
	 */
	private $plugin_slug;

	/**
	 * Plugin prefix.
	 *
	 * @var     string
	 * @access  private
	 * @since   0.1.0
	 */
	private $plugin_prefix;

	/**
	 * Constructor.
	 *
	 * @since       0.1.0
	 */
	public function __construct() {
		$this->plugin_root   = PLUGIN_NAME_ROOT;
		$this->plugin_name   = PLUGIN_NAME_NAME;
		$this->plugin_slug   = PLUGIN_NAME_SLUG;
		$this->plugin_prefix = PLUGIN_NAME_PREFIX;
	}

	/**
	 * Unleash Hell.
	 *
	 * Make sure you check defined( 'WP_UNINSTALL_PLUGIN' ) before
	 * executing any code; to check if WordPress is in un-install mode.
	 *
	 * @since       0.1.0
	 */
	public function run() {
		register_uninstall_hook( PLUGIN_NAME_ROOT, array( 'mkdo_blocks\Uninstaller', 'uninstall' ) );
	}

	/**
	 * Uninstall
	 *
	 * Runs code on uninstall.
	 *
	 * @since       0.1.0
	 */
	public static function uninstall() {

		// Abort if we're not un-installing.
		if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
			return;
		}

		// Remove a transient to confirm uninstallation.
		delete_transient( PLUGIN_NAME_PREFIX . '_activated' );
	}
}
