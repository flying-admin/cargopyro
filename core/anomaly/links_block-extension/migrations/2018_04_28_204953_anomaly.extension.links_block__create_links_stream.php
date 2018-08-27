<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

class AnomalyExtensionLinksBlockCreateLinksStream extends Migration
{

    /**
     * The stream definition.
     *
     * @var array
     */
    protected $stream = [
        'slug'         => 'links',
        'title_column' => 'url',
        'translatable' => true,
    ];

    /**
     * The stream assignments.
     *
     * @var array
     */
    protected $assignments = [
        'text'   => [
            'required'     => true,
            'translatable' => true,
        ],
        'url'    => [
            'required'     => true,
            'translatable' => true,
        ],
        'target' => [
            'required' => true,
        ],
    ];

}
