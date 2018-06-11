<?php

return [
    'id'         => 'pdc_expiration_date',
    'title'      => __('Expiration date', 'pdc-expiration-date'),
    'post_types' => [ 'pdc-item' ],
    'context'    => 'normal',
    'priority'   => 'high',
    'autosave'   => true,
    'fields'     => [
        'internaldata' => [
            'group' => [
                'id'   => 'pdc_expirationdate',
                'name' => __('Select date', 'pdc-expiration-date'),
                'type' => 'datetime',
            ]
        ]
    ]
];

