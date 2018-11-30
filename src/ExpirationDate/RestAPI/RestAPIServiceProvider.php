<?php

namespace OWC\PDC\ExpirationDate\RestAPI;

use OWC\PDC\Base\Foundation\ServiceProvider;

class RestAPIServiceProvider extends ServiceProvider
{
    private $namespace = 'owc/pdc/v1';

    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->plugin->loader->addAction('rest_api_init', $this, 'registerRoutes');
        $this->plugin->loader->addFilter('owc/pdc/rest-api/items/query', new FilterDefaultItems, 'filter', 10, 1);
        $this->plugin->loader->addFilter('owc/pdc/rest-api/items/query/single', new FilterDefaultItems, 'filter', 10, 1);
        $this->plugin->loader->addFilter('p2p_connected_args', new FilterDefaultItems, 'filterP2P', 10, 3);
    }

    /**
     * Register REST routes.
     */
    public function registerRoutes()
    {
        register_rest_route($this->namespace, 'items/expired', [
            'methods'  => 'GET',
            'callback' => [new ExpiredItemsController($this->plugin), 'getItems'],
        ]);
    }
}
