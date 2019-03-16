<?php
/**
 * Plugin Name
 *
 * @link https://github.com/davetgreen/plugin-name
 *
 * @since 0.1.0
 *
 * @package DTG\Plugin_Name
 *
 * Plugin Name:  Plugin Name
 * Plugin URI:   https://github.com/davetgreen/plugin-name
 * Description:  A brief description of the plugin.
 * Version:      0.1.0
 * Contributors: davetgreen
 * Author:       Dave Green <hello@davetgreen.me>
 * Author URI:   https://www.davetgreen.me
 * License:      GPL-3.0+
 * License URI:  http://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain:  plugin-name
 * Domain Path:  /languages
 */

/**
 * Abort if this file is called directly.
 */
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Constants.
 */
define( 'PLUGIN_NAME_ROOT', __FILE__ );
define( 'PLUGIN_NAME_NAME', 'Plugin Name' );
define( 'PLUGIN_NAME_SLUG', 'plugin-name' );
define( 'PLUGIN_NAME_PREFIX', 'plugin_name' );

/**
 * Classes (Comment out as appropriate).
 */
require_once 'blocks/blocks.php';
require_once 'classes/class-activator.php';
require_once 'classes/class-customizer.php';
require_once 'classes/class-deactivator.php';
require_once 'classes/class-enqueues.php';
require_once 'classes/class-gutenberg.php';
require_once 'classes/class-helpers.php';
require_once 'classes/class-notices.php';
require_once 'classes/class-settings.php';
require_once 'classes/class-uninstaller.php';

/**
 * Namespaces (Comment out as appropriate).
 */
use DTG\Plugin_Name\Activator;
use DTG\Plugin_Name\Customizer;
use DTG\Plugin_Name\Deactivator;
use DTG\Plugin_Name\Enqueues;
use DTG\Plugin_Name\Gutenberg;
use DTG\Plugin_Name\Helpers;
use DTG\Plugin_Name\Notices;
use DTG\Plugin_Name\Settings;
use DTG\Plugin_Name\Uninstaller;

/**
 * Instances (Comment out as appropriate).
 */
$plugin_name_activator   = new Activator();
$plugin_name_customizer  = new Customizer();
$plugin_name_deactivator = new Deactivator();
$plugin_name_enqueues    = new Enqueues();
$plugin_name_gutenberg   = new Gutenberg();
$plugin_name_notices     = new Notices();
$plugin_name_settings    = new Settings();
$plugin_name_uninstaller = new Uninstaller();

/**
 * Textdomain.
 *
 * First parameter must be a string, not a constant.
 */
load_plugin_textdomain(
	'plugin-name',
	false,
	PLUGIN_NAME_ROOT . '/languages'
);

/**
 * Unleash Hell  (Comment out as appropriate).
 */
$plugin_name_activator->run();
$plugin_name_customizer->run();
$plugin_name_deactivator->run();
$plugin_name_enqueues->run();
$plugin_name_gutenberg->run();
$plugin_name_notices->run();
$plugin_name_settings->run();
$plugin_name_uninstaller->run();
