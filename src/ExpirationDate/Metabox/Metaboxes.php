<?php

namespace OWC\PDC\ExpirationDate\Metabox;

use OWC\PDC\Base\Foundation\Plugin;

class Metaboxes
{

    /**
     * Instance of the Plugin.
     *
     * @var Plugin
     */
    private $plugin;

    public function __construct(Plugin $plugin)
    {
        $this->plugin = $plugin;
    }

    /**
     * Register metaboxes for internal data into pdc-base plugin.
     *
     * @param Plugin $basePlugin
     */
    public function register(Plugin $basePlugin)
    {
        $basePlugin->config->set('metaboxes.expirationdate', $this->plugin->config->get('metaboxes'));
    }
}
