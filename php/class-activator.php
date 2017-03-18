<?php
/**
 * Activator Class.
 *
 * @since	0.1.0
 *
 * @package dtg\plugin_name
 */

namespace dtg\plugin_name;

/**
 * Class Activator
 *
 * Carry out actions when the plugin is activated.
 *
 * @since	0.1.0
 *
 * @package dtg\plugin_name
 */
class Activator {

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
	 * @since	0.1.0
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
	 * @since	0.1.0
	 */
	public function run() {
		// Register the activation callback.
		register_activation_hook( $this->plugin_root, array( $this, 'activate' ) );
	}

	/**
	 * Activate the plugin.
	 *
	 * @since	0.1.0
	 */
	public function activate() {
		// Set a transient to confirm activation.
		set_transient( $this->plugin_prefix . '_activated', true, 10 );
	}
}
