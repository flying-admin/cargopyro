<?php namespace Anomaly\BlocksModule;

use Anomaly\BlocksFieldType\BlocksFieldType;
use Anomaly\Streams\Platform\Addon\Module\Module;

/**
 * Class BlocksModule
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\BlocksModule
 */
class BlocksModule extends Module
{

    /**
     * The sub-addons.
     *
     * @var array
     */
    protected $addons = [
        BlocksFieldType::class,
    ];

    /**
     * The module addon.
     *
     * @var string
     */
    protected $icon = 'magic';

    /**
     * The module sections.
     *
     * @var array
     */
    protected $sections = [
        'areas'  => [
            'buttons' => [
                'new_area',
            ],
        ],
        'blocks' => [
            'slug'        => 'blocks',
            'data-toggle' => 'modal',
            'data-target' => '#modal',
            'data-href'   => 'admin/blocks/{request.route.parameters.area}',
            'href'        => 'admin/blocks/choose',

            'buttons' => [
                'add_block' => [
                    'data-toggle' => 'modal',
                    'data-target' => '#modal',
                    'href'        => 'admin/blocks/{request.route.parameters.area}/choose',
                ],
            ],
        ],
    ];

}
