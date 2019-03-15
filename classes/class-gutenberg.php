<?php
/**
 * Gutenberg Class.
 *
 * @since   0.1.0
 *
 * @package DTG\Plugin_Name
 *
 * @todo    Add the Gutenberg PHP methods needed to register blocks.
 * @see     https://github.com/mkdo/caspian/blob/master/build/wp-content/mu-plugins/mkdo-blocks/index.php
 */

namespace DTG\Plugin_Name;

// Abort if this file is called directly.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Class Gutenberg
 *
 * Register Gutenberg blocks.
 *
 * @since   0.1.0
 *
 * @package DTG\Plugin_Name
 */
class Gutenberg {

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
	 * @since   0.1.0
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
	 * @since   0.1.0
	 */
	public function run() {
	}
}
