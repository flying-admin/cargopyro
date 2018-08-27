<?php

use Anomaly\BlocksFieldType\Support\Config\BlocksHandler;

return [
    'blocks' => [
        'type'   => 'anomaly.field_type.checkboxes',
        'config' => [
            'handler' => BlocksHandler::class,
        ],
    ],
    'min'    => [
        'type'   => 'anomaly.field_type.integer',
        'config' => [
            'min' => 1,
        ],
    ],
    'max'    => [
        'type'   => 'anomaly.field_type.integer',
        'config' => [
            'min' => 1,
        ],
    ],
];
