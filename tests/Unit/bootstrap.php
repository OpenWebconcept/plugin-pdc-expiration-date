<?php

/**
 * PHPUnit bootstrap file
 */

/**
 * Load dependencies with Composer autoloader.
 */
require __DIR__ . '/../../vendor/autoload.php';

define('WP_PLUGIN_DIR', __DIR__);

/**
 * Bootstrap WordPress Mock.
 */
\WP_Mock::setUsePatchwork(true);
\WP_Mock::bootstrap();

$GLOBALS['pdc-expiration-date'] = [
    'active_plugins' => ['pdc-expiration-date/pdc-expiration-date.php'],
];

class WP_CLI
{
    public static function add_command()
    {
    }
}
