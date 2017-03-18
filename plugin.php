<?php
/**
 * Plugin Name
 *
 * @link              https://github.com/davetgreen/plugin-name
 *
 * @since	0.1.0
 *
 * @package           dtg\plugin-name
 *
 * Plugin Name:       Plugin Name
 * Plugin URI:        https://github.com/davetgreen/plugin-name
 * Description:       A brief description of the plugin.
 * Version:           0.1.0
 * Contributors:	  davetgreen, mkdo
 * Author:            Dave Green <hello@davetgreen.me>
 * Author URI:        http://www.davetgreen.me
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       plugin-name
 * Domain Path:       /languages
 */

// Abort if this file is called directly.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Constants.
define( 'DTG_PLUGIN_NAME_ROOT', __FILE__ );
define( 'DTG_PLUGIN_NAME_NAME', 'Plugin Name' );
define( 'DTG_PLUGIN_NAME_TEXT_DOMAIN', 'plugin-name' );
define( 'DTG_PLUGIN_NAME_PREFIX', 'plugin_name' );

// Classes.
require_once 'php/class-settings.php';
require_once 'php/class-helpers.php';
require_once 'php/class-activator.php';
require_once 'php/class-deactivator.php';
require_once 'php/class-uninstaller.php';
require_once 'php/class-notices.php';
require_once 'php/class-assets-controller.php';
require_once 'php/class-customizer.php';
require_once 'php/class-main-controller.php';

// Namespaces.
use dtg\plugin_name\Settings;
use dtg\plugin_name\Helpers;
use dtg\plugin_name\Activator;
use dtg\plugin_name\Deactivator;
use dtg\plugin_name\Uninstaller;
use dtg\plugin_name\Notices;
use dtg\plugin_name\Assets_Controller;
use dtg\plugin_name\Customizer;
use dtg\plugin_name\Main_Controller;

// Instances.
$settings                 = new Settings();
$helpers				  = new Helpers();
$activator    			  = new Activator();
$deactivator  			  = new Deactivator();
$uninstaller  			  = new Uninstaller();
$notices	  			  = new Notices();
$assets_controller  	  = new Assets_Controller();
$customizer               = new Customizer();
$main_controller          = new Main_Controller(
	$settings,
	$activator,
	$deactivator,
	$uninstaller,
	$notices,
	$assets_controller,
	$customizer
);

// Go.
$main_controller->run();
