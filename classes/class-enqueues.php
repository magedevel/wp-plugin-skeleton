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
	 * Debug mode status
	 *
	 * @var     bool
	 * @access  private
	 * @since   0.1.0
	 */
	private $debug_mode;

	/**
	 * Asset Suffix
	 *
	 * @var     string
	 * @access  private
	 * @since   0.1.0
	 */
	private $asset_suffix;

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

		// Determine whether we're in debug mode, and what the
		// asset suffix should be.
		$this->debug_mode   = ( defined( 'WP_DEBUG' ) && true === WP_DEBUG ) ? true : false;
		$this->asset_suffix = ( defined( 'WP_DEBUG' ) && true === WP_DEBUG ) ? '' : '.min';
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

		// Enqueue Customizer JS.
		add_action( 'enqueue_block_editor_assets', array( $this, 'gutenberg_editor_js' ), 10 );

		// Enqueue Customizer JS.
		add_action( 'enqueue_block_assets', array( $this, 'gutenberg_front_js' ), 10 );
	}

	/**
	 * Enqueue Public Scripts.
	 *
	 * @since   0.1.0
	 */
	public function public_enqueue_scripts() {

		$do_public_enqueue     = apply_filters( $this->plugin_prefix . 'do_public_enqueue', true );
		$do_public_css_enqueue = apply_filters( $this->plugin_prefix . 'do_public_css_enqueue', true );
		$do_public_js_enqueue  = apply_filters( $this->plugin_prefix . 'do_public_js_enqueue', true );

		// Public CSS.
		if ( $do_public_enqueue && $do_public_css_enqueue ) {
			$public_css_url  = plugins_url( '/assets/dist/css/' . $this->plugin_slug . '-public' . $this->asset_suffix . '.css', $this->plugin_root );
			$public_css_path = dirname( $this->plugin_root ) . '/assets/dist/css' . $this->plugin_slug . '-public' . $this->asset_suffix . '.css';

			wp_enqueue_style(
				$this->plugin_slug . '-public-css',
				$public_css_url,
				array(),
				filemtime( $public_css_path )
			);
		}

		// Public JS.
		if ( $do_public_enqueue && $do_public_js_enqueue ) {
			$public_js_url  = plugins_url( '/assets/dist/js/' . $this->plugin_slug . '-public' . $this->asset_suffix . '.js', $this->plugin_root );
			$public_js_path = dirname( $this->plugin_root ) . '/assets/dist/js/' . $this->plugin_slug . '-public' . $this->asset_suffix . '.js';

			wp_enqueue_script(
				$this->plugin_slug . '-public-js',
				$public_js_url,
				array( 'jquery' ),
				filemtime( $public_js_path ),
				true
			);
		}
	}

	/**
	 * Enqueue Admin Scripts.
	 *
	 * @since   0.1.0
	 */
	public function admin_enqueue_scripts() {

		$do_admin_enqueue     = apply_filters( $this->plugin_prefix . 'do_admin_enqueue', true );
		$do_admin_css_enqueue = apply_filters( $this->plugin_prefix . 'do_admin_css_enqueue', true );
		$do_admin_js_enqueue  = apply_filters( $this->plugin_prefix . 'do_admin_js_enqueue', true );

		if ( $do_admin_enqueue && $do_admin_css_enqueue ) {
			$admin_css_url  = plugins_url( '/assets/dist/css/' . $this->plugin_slug . '-admin' . $this->asset_suffix . '.css', $this->plugin_root );
			$admin_css_path = dirname( $this->plugin_root ) . '/assets/dist/css/' . $this->plugin_slug . '-admin' . $this->asset_suffix . '.css';

			wp_enqueue_style(
				$this->plugin_slug . '-admin-css',
				$admin_css_url,
				array(),
				filemtime( $admin_css_path )
			);
		}

		if ( $do_admin_enqueue && $do_admin_js_enqueue ) {
			$admin_js_url  = plugins_url( '/assets/dist/js/' . $this->plugin_slug . '-admin' . $this->asset_suffix . '.js', $this->plugin_root );
			$admin_js_path = dirname( $this->plugin_root ) . '/assets/dist/js/' . $this->plugin_slug . '-admin' . $this->asset_suffix . '.js';

			wp_enqueue_script(
				$this->plugin_slug . '-admin-js',
				$admin_js_url,
				array( 'jquery' ),
				filemtime( $admin_js_path ),
				true
			);
		}
	}

	/**
	 * Enqueue Customizer live preview JS handlers.
	 *
	 * @since   0.1.0
	 */
	public function customizer_preview_js() {

		$do_customizer_js_enqueue = apply_filters( $this->plugin_prefix . 'do_customizer_js_enqueue', true );

		if ( $do_customizer_js_enqueue ) {
			$customizer_js_url  = plugins_url( '/assets/dist/js/' . $this->plugin_slug . '-customizer' . $this->asset_suffix . '.js', $this->plugin_root );
			$customizer_js_path = dirname( $this->plugin_root ) . '/assets/dist/js/' . $this->plugin_slug . '-customizer' . $this->asset_suffix . '.js';

			wp_enqueue_script(
				$this->plugin_slug . '-customizer',
				$customizer_js_url,
				array( 'customize-preview' ),
				filemtime( $customizer_js_path ),
				true
			);
		}
	}

	/**
	 * Enqueue Gutenberg editor CSS & JS.
	 *
	 * @since   0.1.0
	 */
	public function gutenberg_editor_js() {

		$do_gutenberg_editor_js_enqueue  = apply_filters( $this->plugin_prefix . 'do_gutenberg_editor_js_enqueue', true );
		$do_gutenberg_editor_css_enqueue = apply_filters( $this->plugin_prefix . 'do_gutenberg_editor_css_enqueue', true );

		if ( $do_gutenberg_editor_js_enqueue ) {

			$gutenberg_editor_js_url  = plugins_url( '/assets/dist/js/' . $this->plugin_slug . '-gutenberg-editor' . $this->asset_suffix . '.js', $this->plugin_root );
			$gutenberg_editor_js_path = dirname( $this->plugin_root ) . '/assets/dist/js/' . $this->plugin_slug . '-gutenberg-editor' . $this->asset_suffix . '.js';

			wp_enqueue_script(
				$this->plugin_slug . '-gutenberg-editor-js',
				$gutenberg_editor_js_url,
				[ 'wp-i18n', 'wp-element', 'wp-blocks', 'wp-components', 'wp-api' ],
				filemtime( $gutenberg_editor_js_path ),
				true
			);

			wp_localize_script(
				$this->plugin_slug . '-gutenberg-editor-js',
				[
					'rest_url' => esc_url( rest_url() ),
				]
			);
		}

		if ( $do_gutenberg_editor_css_enqueue ) {

			$gutenberg_editor_css_url  = plugins_url( '/assets/dist/css/' . $this->plugin_slug . '-gutenberg-editor' . $this->asset_suffix . '.css', $this->plugin_root );
			$gutenberg_editor_css_path = dirname( $this->plugin_root ) . '/assets/dist/css/' . $this->plugin_slug . '-gutenberg-editor' . $this->asset_suffix . '.css';

			wp_enqueue_style(
				$this->plugin_slug . '-gutenberg-editor-css',
				$gutenberg_editor_css_url,
				[ 'wp-blocks' ],
				filemtime( $gutenberg_editor_css_path )
			);
		}
	}

	/**
	 * Enqueue Gutenberg front-end CSS & JS.
	 *
	 * @since   0.1.0
	 */
	public function gutenberg_front_js() {

		$do_gutenberg_front_js_enqueue  = apply_filters( $this->plugin_prefix . 'do_gutenberg_front_js_enqueue', true );
		$do_gutenberg_front_css_enqueue = apply_filters( $this->plugin_prefix . 'do_gutenberg_front_css_enqueue', true );

		// This hook enqueues on both the admin and front-end,
		// so we need to make this conditional.
		if ( ! is_admin() && $do_gutenberg_front_js_enqueue ) {

			$gutenberg_front_js_url  = plugins_url( '/assets/dist/js/' . $this->plugin_slug . '-gutenberg-front' . $this->asset_suffix . '.js', $this->plugin_root );
			$gutenberg_front_js_path = dirname( $this->plugin_root ) . '/assets/dist/js/' . $this->plugin_slug . '-gutenberg-front' . $this->asset_suffix . '.js';

			wp_enqueue_script(
				$this->plugin_slug . '-gutenberg-front-js',
				$gutenberg_front_js_url,
				[ 'wp-i18n', 'wp-element', 'wp-blocks', 'wp-components', 'wp-api' ],
				filemtime( $gutenberg_front_js_path ),
				true
			);
		}

		// This hook enqueues on both the admin and front-end,
		// so we need to make this conditional.
		if ( ! is_admin() && $do_gutenberg_front_css_enqueue ) {

			$gutenberg_front_css_url  = plugins_url( '/assets/dist/css/' . $this->plugin_slug . '-gutenberg-front' . $this->asset_suffix . '.css', $this->plugin_root );
			$gutenberg_front_css_path = dirname( $this->plugin_root ) . '/assets/dist/css/' . $this->plugin_slug . '-gutenberg-front' . $this->asset_suffix . '.css';

			wp_enqueue_style(
				$this->plugin_slug . '-gutenberg-front-css',
				$gutenberg_front_css_url,
				[ 'wp-blocks' ],
				filemtime( $gutenberg_front_css_path )
			);
		}
	}
}
