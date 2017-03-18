<?php
/**
 * Uninstaller Class.
 *
 * @since	0.1.0
 *
 * @package dtg\plugin_name
 *
 * @todo - Needs work to provide proper validation ahead of an uninstall.
 */

namespace dtg\plugin_name;

/**
 * Class Uninstaller
 *
 * Carry out actions when the plugin is uninstalled.
 *
 * Things to consider:
 *
 * - This method should be static
 * - Check if the $_REQUEST content actually is the plugin name
 * - Run an admin referrer check to make sure it goes through authentication
 * - Verify the output of $_GET makes sense
 * - Repeat with other user roles. Best directly by using the links/query string parameters.
 * - Repeat things for multisite. Once for a single site in the network, once sitewide.
 *
 * @since		0.1.0
 *
 * @package dtg\plugin_name
 */
class Uninstaller {

	/**
	 * Path to the root plugin file.
	 *
	 * @var 	string
	 * @access	private
	 * @since	0.1.0
	 */
	private $plugin_root;

	/**
	 * Plugin name.
	 *
	 * @var 	string
	 * @access	private
	 * @since	0.1.0
	 */
	private $plugin_name;

	/**
	 * Plugin text-domain.
	 *
	 * @var 	string
	 * @access	private
	 * @since	0.1.0
	 */
	private $plugin_textdomain;

	/**
	 * Plugin prefix.
	 *
	 * @var 	string
	 * @access	private
	 * @since	0.1.0
	 */
	private $plugin_prefix;

	/**
	 * Constructor.
	 *
	 * @since		0.1.0
	 */
	public function __construct() {
		$this->plugin_root 		 = DTG_PLUGIN_NAME_ROOT;
		$this->plugin_name		 = DTG_PLUGIN_NAME_NAME;
		$this->plugin_textdomain = DTG_PLUGIN_NAME_TEXT_DOMAIN;
		$this->plugin_prefix     = DTG_PLUGIN_NAME_PREFIX;
	}

	/**
	 * Unleash Hell.
	 *
	 * @since		0.1.0
	 */
	public function run() {
		// Exit if WordPress hasn't requested the uninstall.
		if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
			exit();
		}
	}
}
