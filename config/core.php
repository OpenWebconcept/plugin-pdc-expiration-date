<?php

return [

    /**
     * Service Providers.
     */
    'providers'    => [
        /**
         * Global providers.
         */
        OWC\PDC\ExpirationDate\RestAPI\RestAPIServiceProvider::class,
        \OWC\PDC\ExpirationDate\Metabox\MetaboxServiceProvider::class,

        /**
         * Providers specific to the admin.
         */
        'admin' => [
        ]

    ],

    /**
     * Dependencies upon which the plugin relies.
     *
     * Required: type, label
     * Optional: message
     *
     * Type: plugin
     * - Required: file
     * - Optional: version
     *
     * Type: class
     * - Required: name
     */
    'dependencies' => [
        //
    ]

];