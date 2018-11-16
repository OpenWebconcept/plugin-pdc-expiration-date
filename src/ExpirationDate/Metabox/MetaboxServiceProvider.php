<?php

namespace OWC\PDC\ExpirationDate\Metabox;

use OWC\PDC\Base\Foundation\ServiceProvider;

class MetaboxServiceProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->plugin->loader->addAction('owc/pdc-base/plugin', new Metaboxes($this->plugin), 'register', 10, 1);
    }
}
