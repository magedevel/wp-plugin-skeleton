<?php
/**
 * Gutenberg Class.
 *
 * @since   0.1.0
 *
 * @package DTG\Plugin_Name
 *
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
		add_action( 'block_categories', array( $this, 'register_custom_category' ), 10, 2 );
		add_filter( 'image_size_names_choose', array( $this, 'expose_custom_image_sizes' ), 10, 1 );
	}

	/**
	 * Register a custom blocks category for the plugin.
	 *
	 * @param  array $categories Array of categories.
	 * @return array $categories Array of categories.
	 *
	 * @since 0.1.0
	 */
	public function register_custom_category( $categories ) {

		return array_merge(
			$categories,
			array(
				array(
					'slug'  => 'plugin-name',
					'title' => __( 'Plugin Name', 'plugin-name' ),
				),
			)
		);
	}

	/**
	 * Expose custom image sizes in the admin.
	 *
	 * @since   0.1.0
	 *
	 * @param array $sizes Array of image sizes.
	 */
	public function expose_custom_image_sizes( $sizes ) {

		$all_sizes = get_intermediate_image_sizes();

		$default_sizes = [
			'thumbnail',
			'medium',
			'medium_large',
			'large',
			'full',
		];
		$custom_sizes  = [];

		foreach ( $all_sizes as $size ) {

			if ( ! in_array( $size, $default_sizes, true ) ) {
				$custom_sizes[ $size ] = $size;
			}
		}

		return array_merge( $sizes, $custom_sizes );
	}
}
