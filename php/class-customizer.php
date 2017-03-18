<?php
/**
 * Customizer Class.
 *
 * @since	0.1.0
 *
 * @package dtg\plugin_name
 */

namespace dtg\plugin_name;

/**
 * Class Customizer
 *
 * Register Customizer settings, panels, section and controls.
 *
 * @since		0.1.0
 *
 * @package dtg\plugin_name
 */
class Customizer {

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
		// Handle Settings, Panels, Sections and Controls.
		add_action( 'customize_register', array( $this, 'customizer_settings' ), 10 );
		add_action( 'customize_register', array( $this, 'customizer_panels' ), 15 );
		add_action( 'customize_register', array( $this, 'customizer_sections' ), 20 );
		add_action( 'customize_register', array( $this, 'customizer_controls' ), 25 );
	}

	/**
	 * Register Customizer settings.
	 *
	 * @param	WP_Customize $wp_customize WordPress Customizer object.
	 *
	 * @since	0.1.0
	 */
	public function customizer_settings( $wp_customize ) {

	}

	/**
	 * Register Customizer panels.
	 *
	 * @param	WP_Customize $wp_customize WordPress Customizer object.
	 *
	 * @since	0.1.0
	 */
	public function customizer_panels( $wp_customize ) {

	}

	/**
	 * Register Customizer sections.
	 *
	 * @param	WP_Customize $wp_customize WordPress Customizer object.
	 *
	 * @since	0.1.0
	 */
	public function customizer_sections( $wp_customize ) {

	}

	/**
	 * Register Customizer controls.
	 *
	 * @param	WP_Customize $wp_customize WordPress Customizer object.
	 *
	 * @since	0.1.0
	 */
	public function customizer_controls( $wp_customize ) {

	}
}
