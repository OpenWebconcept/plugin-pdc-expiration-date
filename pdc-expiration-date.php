<?php

/**
 * Plugin Name:       PDC Expiration Date
 * Plugin URI:        https://www.yardinternet.nl/
 * Description:       Make a PDC item expire after a certain date
 * Version:           1.0.7
 * Author:            Yard Internet
 * Author URI:        https://www.yardinternet.nl/
 * License:           GPL-3.0
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain:       pdc-expiration-date
 * Domain Path:       /languages
 */

use OWC\PDC\ExpirationDate\Autoloader;
use OWC\PDC\ExpirationDate\Foundation\Plugin;

/**
 * If this file is called directly, abort.
 */
if (!defined('WPINC')) {
    die;
}

/**
 * manual loaded file: the autoloader.
 */
if (file_exists(__DIR__ . '/vendor/autoload.php')) {
    require_once __DIR__ . '/vendor/autoload.php';
} else {
    require_once __DIR__ . '/autoloader.php';
    $autoloader = new Autoloader();
}

/**
 * Begin execution of the plugin
 *
 * This hook is called once any activated plugins have been loaded. Is generally used for immediate filter setup, or
 * plugin overrides. The plugins_loaded action hook fires early, and precedes the setup_theme, after_setup_theme, init
 * and wp_loaded action hooks.
 */
add_action('plugins_loaded', function () {
    if (! class_exists('OWC\PDC\Base\Foundation\Plugin')) {
        add_action('admin_notices', function () {
            $list = '<p>' . __(
                'The following plugins are required to use the PDC Expiration Date plugin:',
                'pdc-expiration-date'
            ) . '</p><ol><li>OpenPDC Base (version >= 3.0.0)</li></ol>';

            printf('<div class="notice notice-error"><p>%s</p></div>', $list);
        });

        \deactivate_plugins(\plugin_basename(__FILE__));

        return;
    }

    $plugin = (new Plugin(__DIR__))->boot();
}, 10);
