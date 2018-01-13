<?php
/**
 * Notices Class.
 *
 * @since	0.1.0
 *
 * @package Plugin_Name
 */

namespace Plugin_Name;

/**
 * Class Notices
 *
 * Generates various plugin notices, including on activation.
 *
 * @since	0.1.0
 *
 * @package Plugin_Name
 */
class Notices {

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
	 * Plugin slug.
	 *
	 * @var 	string
	 * @access	private
	 * @since	0.1.0
	 */
	private $plugin_slug;

	/**
	 * Plugin prefix.
	 *
	 * @var 	string
	 * @access	private
	 * @since	0.1.0
	 */
	private $plugin_prefix;

	/**
	 * Plugin text-domain.
	 *
	 * @var 	string
	 * @access	private
	 * @since	0.1.0
	 */
	private $plugin_textdomain;

	/**
	 * Constructor
	 *
	 * @since	0.1.0
	 */
	function __construct() {
		$this->plugin_root 		 = PLUGIN_NAME_ROOT;
		$this->plugin_name		 = PLUGIN_NAME_NAME;
		$this->plugin_slug		 = PLUGIN_NAME_SLUG;
		$this->plugin_prefix     = PLUGIN_NAME_PREFIX;
		$this->plugin_textdomain = 'plugin-name';
	}

	/**
	 * Unleash Hell.
	 *
	 * @since	0.1.0
	 */
	public function run() {
		// Hook in specific functionality such as adding notices etc.
		add_action( 'admin_notices', array( $this, 'display_activation_notices' ), 10 );

		// Display warning if using unsupported PHP version.
		add_action( 'admin_notices', array( $this, 'display_php_version_warning_notice' ), 15 );
	}

	/**
	 * Display notice(s) on plugin activation.
	 *
	 * @since	0.1.0
	 */
	public function display_activation_notices() {

		// Does the activation transient exist?
		if ( ! empty( get_transient( $this->plugin_prefix . '_activated' ) ) ) {

			$activation_notices = array();

			// Add a successful activation notice.
			$activation_text      = __( sprintf( '%s has been successfully activated.', $this->plugin_name ), $this->plugin_textdomain );
			$activation_notice    = apply_filters( $this->plugin_prefix . '_activation_notice', $activation_text );
			$activation_notices[] = $activation_notice;

			// Have we got any notices to display?
			if ( ! empty( $activation_notices ) ) {

				// Loop through the array and generate the notices.
				foreach ( $activation_notices as $notice ) {
					echo '<div class="updated notice is-dismissible"><p>' . esc_html( $notice ) . '</p></div>';
				}
			}

			// Delete the activated/deactivated transients.
			delete_transient( $this->plugin_prefix . '_activated' );
			delete_transient( $this->plugin_prefix . '_deactivated' );
		}
	}

	/**
	 * Display warning if running an unsupported version of PHP
	 *
	 * @since	0.1.0
	 */
	public function display_php_version_warning_notice() {

		$min_php_version = '5.6';

		if ( version_compare( phpversion(), $min_php_version, '<' ) ) {

			$php_version_notice = __( sprintf( 'Your web-server is running an un-supported version of PHP. Please upgrade to version %s  or higher to avoid potential issues with %s and other WordPress plugins.', $min_php_version, $this->plugin_name ), $this->plugin_textdomain );

			echo '<div class="error notice notice-warning"><p>' . esc_html( $php_version_notice ) . '</p></div>';
		}

	}
}
