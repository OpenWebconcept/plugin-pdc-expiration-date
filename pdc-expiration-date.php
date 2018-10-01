<?php
/**
 * Plugin Name:       PDC Expiration Date
 * Plugin URI:        https://www.openwebconcept.nl/
 * Description:       Make a PDC item expire after a certain date
 * Version:           1.0.0
 * Author:            Yard Internet
 * Author URI:        https://www.yardinternet.nl/
 * License:           GPL-3.0
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain:       pdc-expiration-date
 * Domain Path:       /languages
 */

use OWC\PDC\ExpirationDate\Autoloader;
use OWC\PDC\ExpirationDate\Foundation\Hooks;
use OWC\PDC\ExpirationDate\Foundation\Plugin;

/**
 * If this file is called directly, abort.
 */
if (!defined('WPINC')) {
    die;
}

// Don't boot if base plugin is not active.
if (!is_plugin_active('pdc-base/pdc-base.php')) {
    return;
}

/**
 * manual loaded file: the autoloader.
 */
require_once __DIR__ . '/autoloader.php';
$autoloader = new Autoloader();

/**
 * This hook registers a plugin function to be run when the plugin is activated.
 */
register_activation_hook(__FILE__, [Hooks::class, 'pluginActivation']);

/**
 * This hook is run immediately after any plugin is activated, and may be used to detect the activation of plugins.
 * If a plugin is silently activated (such as during an update), this hook does not fire.
 */
add_action('activated_plugin', [Hooks::class, 'pluginActivated'], 10, 2);

/**
 * This hook is run immediately after any plugin is deactivated, and may be used to detect the deactivation of other
 * plugins.
 */
add_action('deactivated_plugin', [Hooks::class, 'pluginDeactivated'], 10, 2);

/**
 * This hook registers a plugin function to be run when the plugin is deactivated.
 */
register_deactivation_hook(__FILE__, [Hooks::class, 'pluginDeactivation']);

/**
 * Registers the uninstall hook that will be called when the user clicks on the uninstall link that calls for the
 * plugin to uninstall itself. The link won’t be active unless the plugin hooks into the action.
 */
register_uninstall_hook(__FILE__, [Hooks::class, 'uninstallPlugin']);

/**
 * Begin execution of the plugin
 *
 * This hook is called once any activated plugins have been loaded. Is generally used for immediate filter setup, or
 * plugin overrides. The plugins_loaded action hook fires early, and precedes the setup_theme, after_setup_theme, init
 * and wp_loaded action hooks.
 */
add_action('plugins_loaded', function () {
    $plugin = (new Plugin(__DIR__))->boot();
}, 10);
