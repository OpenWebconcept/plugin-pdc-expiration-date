<?php

namespace OWC\PDC\ExpirationDate\RestAPI;

use OWC\PDC\Base\Support\CreatesFields;
use WP_Post;

class ExpirationDateField extends CreatesFields
{

    /**
     * Create the appointment field for a given post.
     *
     * @param WP_Post $post
     *
     * @return string
     */
    public function create(WP_Post $post): string
    {
        return get_post_meta($post->ID, '_owc_pdc_expirationdate', true) ?: '';
    }
}
