<?php

namespace OWC\PDC\ExpirationDate\RestAPI;

use OWC\PDC\Base\Models\Item;
use OWC\PDC\Base\RestAPI\Controllers\BaseController;
use WP_REST_Request;

class ExpiredItemsController extends BaseController
{

    /**
     * Get a list of all internal items.
     *
     * @param WP_REST_Request $request
     *
     * @return array
     */
    public function getItems(WP_REST_Request $request)
    {
        $items = (new Item())
            ->query([
                'meta_query' => [
                    [
                        'key'     => '_owc_pdc_expirationdate',
                        'value'   => date("Y-m-d h:i:s"),
                        'compare' => '<',
                        'type'    => 'DATETIME'
                    ],
                ]
            ])
            ->query($this->getPaginatorParams($request))
            ->addField('expired', new ExpirationDateField($this->plugin))
            ->hide([ 'connected' ]);

        $posts = $items->all();

        return $this->addPaginator($posts, $items->getQuery());
    }
}
