<?php

return [
    'min'           => [
        'type'   => 'anomaly.field_type.integer',
        'config' => [
            'min' => 1,
        ],
    ],
    'max'           => [
        'type'   => 'anomaly.field_type.integer',
        'config' => [
            'min' => 1,
        ],
    ],
    'filter'        => [
        'type'   => 'anomaly.field_type.tags',
        'config' => [
            'free_input' => false,
            'options'    => [
                'FILTER_VALIDATE_EMAIL',
                'FILTER_VALIDATE_IP',
                'FILTER_VALIDATE_URL',
            ],
        ],
    ],
    'default_value' => [
        'type' => 'anomaly.field_type.tags',
    ],
];
