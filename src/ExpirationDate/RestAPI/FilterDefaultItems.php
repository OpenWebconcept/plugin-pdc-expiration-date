<?php

namespace OWC\PDC\ExpirationDate\RestAPI;

use OWC\PDC\Base\Support\Traits\AppendToTaxQuery;

class FilterDefaultItems
{
    use AppendToTaxQuery;

    /**
     * Ensures that all regular PDC item are of type "external".
     *
     * @filter owc/pdc/rest-api/items/query
     *
     * @param array $args
     *
     * @return array
     */
    public function filter(array $args): array
    {
        // Either the expiration is set and we filter, or the date is not set.
        $args['meta_query'] = $this->appendToTaxQuery($args['meta_query'] ?? [], [
            'relation' => 'OR',
            [
                'key'     => '_owc_pdc_expirationdate',
                'value'   => date("Y-m-d h:i:s"),
                'compare' => '>=',
                'type'    => 'DATETIME',
            ],
            [
                'key'     => '_owc_pdc_expirationdate',
                'compare' => 'NOT EXISTS',
            ],
        ]);

        return $args;
    }
}
