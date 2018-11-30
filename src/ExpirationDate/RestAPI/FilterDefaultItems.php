<?php

namespace OWC\PDC\ExpirationDate\RestAPI;

use OWC\PDC\Base\Support\Traits\AppendToTaxQuery;

class FilterDefaultItems
{
    use AppendToTaxQuery;

    /**
     * Ensures that all regular PDC items which have an expired date are excluded.
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

    /**
     * Ensures that all connected PDC items which have an expired date are excluded.
     *
     * @param array $args
     * @param P2P_Directed_Connection_Type $directed
     * @param P2P_Item_Post $item
     * @return array
     */
    public function filterP2P($args, $directed, $item)
    {
        if (in_array('pdc-item', $directed->side['from']->query_vars['post_type'])) {
            $args = $this->filter($args);
        }

        return $args;
    }
}
