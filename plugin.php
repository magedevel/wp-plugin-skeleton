<?php
/**
 * Plugin Name
 *
 * @link https://github.com/davetgreen/plugin-name
 *
 * @since 0.1.0
 *
 * @package Plugin_Name
 *
 * Plugin Name:  Plugin Name
 * Plugin URI:   https://github.com/davetgreen/plugin-name
 * Description:  A brief description of the plugin.
 * Version:      0.1.0
 * Contributors: davetgreen, mkdo
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
 * Classes.
 */
require_once 'php/class-activator.php';
require_once 'php/class-controller-assets.php';
require_once 'php/class-customizer.php';
require_once 'php/class-deactivator.php';
require_once 'php/class-gutenberg.php';
require_once 'php/class-helpers.php';
require_once 'php/class-notices.php';
require_once 'php/class-settings.php';
require_once 'php/class-uninstaller.php';

/**
 * Namespaces.
 */
use Plugin_Name\Activator;
use Plugin_Name\Controller_Assets;
use Plugin_Name\Customizer;
use Plugin_Name\Deactivator;
use Plugin_Name\Gutenberg;
use Plugin_Name\Helpers;
use Plugin_Name\Notices;
use Plugin_Name\Settings;
use Plugin_Name\Uninstaller;

/**
 * Instances.
 */
$activator    	   = new Activator();
$controller_assets = new Controller_Assets();
$customizer        = new Customizer();
$deactivator  	   = new Deactivator();
$gutenberg         = new Gutenberg();
$notices	  	   = new Notices();
$settings          = new Settings();
$uninstaller  	   = new Uninstaller();

/**
 * Textdomain.
 */
load_plugin_textdomain(
	'plugin-name',
	false,
	PLUGIN_NAME_ROOT . '/languages'
);

/**
 * Unleash Hell.
 */
$activator->run();
$controller_assets->run();
$customizer->run();
$deactivator->run();
$gutenberg->run();
$notices->run();
$settings->run();
$uninstaller->run();
