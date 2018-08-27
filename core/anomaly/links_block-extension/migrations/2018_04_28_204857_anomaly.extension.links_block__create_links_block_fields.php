<?php

use Anomaly\LinksBlockExtension\Link\LinkModel;
use Anomaly\Streams\Platform\Database\Migration\Migration;

class AnomalyExtensionLinksBlockCreateLinksBlockFields extends Migration
{

    /**
     * The addon fields.
     *
     * @var array
     */
    protected $fields = [
        'text'   => 'anomaly.field_type.text',
        'url'    => 'anomaly.field_type.url',
        'target' => [
            'type'   => 'anomaly.field_type.select',
            'config' => [
                'default_value' => '_self',
                'options'       => [
                    '_self'  => 'anomaly.extension.links_block::field.target.option.self',
                    '_blank' => 'anomaly.extension.links_block::field.target.option.blank',
                ],
            ],
        ],
        'links'  => [
            'type'   => 'anomaly.field_type.repeater',
            'config' => [
                'related' => LinkModel::class,
                'add_row' => 'anomaly.extension.links_block::button.add_link',
            ],
        ],
    ];

}
