<?php
/**
 * Enqueues Class.
 *
 * @since   0.1.0
 *
 * @package DTG\Plugin_Name
 *
 * @todo    Refactor the asset paths.
 */

namespace DTG\Plugin_Name;

/**
 * Class Enqueues
 *
 * Enqueues JS and CSS dependencies.
 *
 * @since   0.1.0
 *
 * @package DTG\Plugin_Name
 */
class Enqueues {

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
	 * Gutenberg dependencies.
	 *
	 * @var     array
	 * @access  private
	 * @since   0.1.0
	 */
	private $dependencies;

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

		$this->dependencies = [
			'wp-api',
			'wp-blocks',
			'wp-components',
			'wp-data',
			'wp-editor',
			'wp-element',
			'wp-i18n',
		];
	}

	/**
	 * Unleash Hell.
	 *
	 * @since   0.1.0
	 */
	public function run() {
		// Enqueue Front-end JS.
		add_action( 'wp_enqueue_scripts', array( $this, 'public_enqueue_scripts' ), 10 );

		// Enqueue Admin JS.
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts' ), 10 );

		// Enqueue Customizer JS.
		add_action( 'customize_preview_init', array( $this, 'customizer_preview_js' ), 10 );

		// Enqueue Block Editor Assets.
		add_action( 'enqueue_block_editor_assets', array( $this, 'block_editor_assets' ), 10 );

		// Enqueue Block Front and Back End Assets.
		add_action( 'enqueue_block_assets', array( $this, 'block_assets' ), 10 );
	}

	/**
	 * Enqueue Public Scripts.
	 *
	 * @since   0.1.0
	 */
	public function public_enqueue_scripts() {

		// Public CSS.
		$public_css_url  = plugins_url( '/assets/dist/' . $this->plugin_slug . '-public.css', $this->plugin_root );
		$public_css_path = dirname( $this->plugin_root ) . '/assets/dist/' . $this->plugin_slug . '-public.css';

		wp_enqueue_style(
			$this->plugin_slug . '-public-css',
			$public_css_url,
			array(),
			filemtime( $public_css_path )
		);

		// Public JS.
		$public_js_url  = plugins_url( '/assets/dist/' . $this->plugin_slug . '-public.js', $this->plugin_root );
		$public_js_path = dirname( $this->plugin_root ) . '/assets/dist/' . $this->plugin_slug . '-public.js';

		wp_enqueue_script(
			$this->plugin_slug . '-public-js',
			$public_js_url,
			array( 'jquery' ),
			filemtime( $public_js_path ),
			true
		);
	}

	/**
	 * Enqueue Admin Scripts.
	 *
	 * @since   0.1.0
	 */
	public function admin_enqueue_scripts() {

		// Admin CSS.
		$admin_css_url  = plugins_url( '/assets/dist/' . $this->plugin_slug . '-admin.css', $this->plugin_root );
		$admin_css_path = dirname( $this->plugin_root ) . '/assets/dist/' . $this->plugin_slug . '-admin.css';

		wp_enqueue_style(
			$this->plugin_slug . '-admin-css',
			$admin_css_url,
			array(),
			filemtime( $admin_css_path )
		);

		// Admin JS.
		$admin_js_url  = plugins_url( '/assets/dist/' . $this->plugin_slug . '-admin.js', $this->plugin_root );
		$admin_js_path = dirname( $this->plugin_root ) . '/assets/dist/' . $this->plugin_slug . '-admin.js';

		wp_enqueue_script(
			$this->plugin_slug . '-admin-js',
			$admin_js_url,
			array( 'jquery' ),
			filemtime( $admin_js_path ),
			true
		);
	}

	/**
	 * Enqueue Customizer live preview JS handlers.
	 *
	 * @since   0.1.0
	 */
	public function customizer_preview_js() {

		$customizer_js_url  = plugins_url( '/assets/dist/' . $this->plugin_slug . '-customizer.js', $this->plugin_root );
		$customizer_js_path = dirname( $this->plugin_root ) . '/assets/dist/' . $this->plugin_slug . '-customizer.js';

		wp_enqueue_script(
			$this->plugin_slug . '-customizer',
			$customizer_js_url,
			array( 'customize-preview' ),
			filemtime( $customizer_js_path ),
			true
		);
	}

	/**
	 * Enqueue Gutenberg editor CSS & JS.
	 *
	 * @since   0.1.0
	 */
	public function block_editor_assets() {

		$editor_js_url  = plugins_url( '/assets/dist/' . $this->plugin_slug . '-block-editor.js', $this->plugin_root );
		$editor_js_path = dirname( $this->plugin_root ) . '/assets/dist/' . $this->plugin_slug . '-block-editor.js';

		wp_enqueue_script(
			$this->plugin_slug . '-block-editor-js',
			$editor_js_url,
			$this->dependencies,
			filemtime( $editor_js_path ),
			true
		);

		wp_localize_script(
			$this->plugin_slug . '-block-editor-js',
			'plugin_name_gb_data',
			[
				'rest_url' => rest_url(),
				'base_url' => plugins_url( 'blocks', __FILE__ ),
			]
		);

		$editor_css_url  = plugins_url( '/assets/dist/' . $this->plugin_slug . '-block-editor.css', $this->plugin_root );
		$editor_css_path = dirname( $this->plugin_root ) . '/assets/dist/' . $this->plugin_slug . '-block-editor.css';

		wp_enqueue_style(
			$this->plugin_slug . '-block-editor-css',
			$editor_css_url,
			[],
			filemtime( $editor_css_path )
		);
	}

	/**
	 * Enqueue Gutenberg front-end CSS & JS.
	 *
	 * @since   0.1.0
	 */
	public function block_assets() {

		// This hook enqueues on both the admin and front-end,
		// so we need to make this conditional.
		if ( ! is_admin() ) {

			$blocks_js_url  = plugins_url( '/assets/dist/' . $this->plugin_slug . '-blocks.js', $this->plugin_root );
			$blocks_js_path = dirname( $this->plugin_root ) . '/assets/dist/' . $this->plugin_slug . '-blocks.js';

			wp_enqueue_script(
				$this->plugin_slug . '-blocks-js',
				$blocks_js_url,
				$this->dependencies,
				filemtime( $blocks_js_path ),
				true
			);
		}

		// This hook enqueues on both the admin and front-end,
		// so we need to make this conditional.
		if ( ! is_admin() ) {

			$blocks_css_url  = plugins_url( '/assets/dist/' . $this->plugin_slug . '-blocks.css', $this->plugin_root );
			$blocks_css_path = dirname( $this->plugin_root ) . '/assets/dist/' . $this->plugin_slug . '-blocks.css';

			wp_enqueue_style(
				$this->plugin_slug . '-blocks-css',
				$blocks_css_url,
				[],
				filemtime( $blocks_css_path )
			);
		}
	}
}
