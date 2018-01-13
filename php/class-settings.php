<?php
/**
 * Settings Class.
 *
 * @since	0.1.0
 *
 * @package Plugin_Name
 */

namespace Plugin_Name;

/**
 * Class Settings
 *
 * @since	0.1.0
 *
 * @package Plugin_Name
 */
class Settings {

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
	 * Constructor.
	 *
	 * @since	0.1.0
	 */
	public function __construct() {
		$this->plugin_root 		 = PLUGIN_NAME_ROOT;
		$this->plugin_name		 = PLUGIN_NAME_NAME;
		$this->plugin_slug		 = PLUGIN_NAME_SLUG;
		$this->plugin_prefix     = PLUGIN_NAME_PREFIX;
		$this->plugin_textdomain = 'plugin-name';
	}

	/**
	 * Do Work
	 *
	 * @since	0.1.0
	 */
	public function run() {
		// @codingStandardsIgnoreStart
		// Uncomment these hooks to create a plugin settings page.
		// add_action( 'admin_init', array( $this, 'init_settings_page' ) );
		// add_action( 'admin_menu', array( $this, 'add_settings_page' ) );
		// add_action( 'plugin_action_links_' . plugin_basename( $this->plugin_root ) , array( $this, 'add_setings_link' ) );
		// @codingStandardsIgnoreEnd
	}

	/**
	 * Initialise the Settings Page.
	 *
	 * @since	0.1.0
	 */
	public function init_settings_page() {

		// Register settings.
		register_setting( $this->plugin_prefix . '_settings_group', $this->plugin_prefix . '_example_setting' );

		// Add sections.
		add_settings_section( $this->plugin_prefix . '_example_section',
			esc_html__( 'Example Section Heading', $this->plugin_textdomain ),
			array( $this, $this->plugin_prefix . '_example_section_cb' ),
			$this->plugin_prefix . '_settings'
		);

		// Add fields to a section.
		add_settings_field( $this->plugin_prefix . '_example_field',
			esc_html__( 'Example Field Label:', $this->plugin_textdomain ),
			array( $this, $this->plugin_prefix . '_example_field_cb' ),
			$this->plugin_prefix . '_settings',
			$this->plugin_prefix . '_example_section'
		);
	}

	/**
	 * Call back for the example section.
	 *
	 * @since	0.1.0
	 */
	public function plugin_name_example_section_cb() {
		echo '<p>' . esc_html( 'Example description for this section.', $this->plugin_textdomain ) . '</p>';
	}

	/**
	 * Call back for the example field.
	 *
	 * @since	0.1.0
	 */
	public function plugin_name_example_field_cb() {
		$example_option = get_option( $this->plugin_prefix . '_example_option', 'Default text...' );
		?>

		<div class="field field-example">
			<p class="field-description">
				<?php esc_html_e( 'This is an example field.', $this->plugin_textdomain );?>
			</p>
			<ul class="field-input">
				<li>
					<label>
						<input type="text" name="<?php echo esc_attr( $this->plugin_prefix . '_example_field' ); ?>" value="<?php echo esc_attr( $example_option ); ?>" />
					</label>
				</li>
			</ul>
		</div>

		<?php
	}

	/**
	 * Add the settings page.
	 *
	 * @since	0.1.0
	 */
	public function add_settings_page() {
		add_submenu_page( 'settings-general.php',
			esc_html__( 'Example Settings', $this->plugin_textdomain ),
			esc_html__( 'Plugin Name', $this->plugin_textdomain ),
			'manage_settings',
			$this->plugin_prefix,
			array( $this, 'render_settings_page' )
		);
	}

	/**
	 * Render the settings page.
	 *
	 * @since	0.1.0
	 */
	public function render_settings_page() {
		?>
		<div class="wrap">
			<h2><?php esc_html_e( 'Plugin Name', $this->plugin_textdomain );?></h2>

			<form action="settings.php" method="POST">
				<?php settings_fields( $this->plugin_prefix . '_settings_group' ); ?>
				<?php do_settings_sections( $this->plugin_prefix . '_settings' ); ?>
				<?php submit_button(); ?>
			</form>
		</div>
	<?php
	}

	/**
	 * Add 'Settings' action on installed plugin list.
	 *
	 * @param array $links An array of plugin action links.
	 *
	 * @since	0.1.0
	 */
	function add_setings_link( $links ) {
		array_unshift( $links, '<a href="settings-general.php?page=' . esc_attr( $this->plugin_prefix ) . '">' . esc_html__( 'Settings', $this->plugin_textdomain ) . '</a>' );

		return $links;
	}
}
