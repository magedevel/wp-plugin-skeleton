<?php
/**
 * Customizer Class.
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
 * Class Customizer
 *
 * Register Customizer settings, panels, section and controls.
 *
 * @since   0.1.0
 *
 * @package DTG\Plugin_Name
 */
class Customizer {

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
		// Handle Settings, Panels, Sections and Controls.
		// NOTE: These hooks contain simple example code to get you up and running.
		add_action( 'customize_register', array( $this, 'customizer_settings' ), 10 );
		add_action( 'customize_register', array( $this, 'customizer_panels' ), 15 );
		add_action( 'customize_register', array( $this, 'customizer_sections' ), 20 );
		add_action( 'customize_register', array( $this, 'customizer_controls' ), 25 );
	}

	/**
	 * Register Customizer settings.
	 *
	 * @param   WP_Customize $wp_customize WordPress Customizer object.
	 *
	 * @since   0.1.0
	 */
	public function customizer_settings( $wp_customize ) {

		$wp_customize->add_setting(
			$this->plugin_prefix . '_example_field',
			array(
				'type'      => 'option',
				'transport' => 'postMessage',
			)
		);
	}

	/**
	 * Register Customizer panels.
	 *
	 * @param   WP_Customize $wp_customize WordPress Customizer object.
	 *
	 * @since   0.1.0
	 */
	public function customizer_panels( $wp_customize ) {

		$wp_customize->add_panel(
			$this->plugin_prefix . '_customizer_panel',
			array(
				'title'    => __( 'Plugin Name Settings', 'plugin-name' ),
				'priority' => 10,
			)
		);
	}

	/**
	 * Register Customizer sections.
	 *
	 * @param   WP_Customize $wp_customize WordPress Customizer object.
	 *
	 * @since   0.1.0
	 */
	public function customizer_sections( $wp_customize ) {

		$wp_customize->add_section(
			$this->plugin_prefix . '_example_section',
			array(
				'title'    => __( 'Example Section', 'plugin-name' ),
				'priority' => 10,
				'panel'    => $this->plugin_prefix . '_customizer_panel',
			)
		);
	}

	/**
	 * Register Customizer controls.
	 *
	 * @param   WP_Customize $wp_customize WordPress Customizer object.
	 *
	 * @since   0.1.0
	 */
	public function customizer_controls( $wp_customize ) {

		$wp_customize->add_control(
			new \WP_Customize_Control(
				$wp_customize,
				$this->plugin_prefix . '_example_field',
				array(
					'label'    => __( 'Example Text', 'plugin-name' ),
					'section'  => $this->plugin_prefix . '_example_section',
					'settings' => $this->plugin_prefix . '_example_field',
					'type'     => 'text',
					'priority' => 1,
				)
			)
		);
	}
}
