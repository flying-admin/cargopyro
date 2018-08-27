<?php namespace Anomaly\BlocksModule\Block\Form;

use Anomaly\Streams\Platform\Ui\Form\Multiple\MultipleFormBuilder;

/**
 * Class BlockInstanceFormBuilder
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class BlockInstanceFormBuilder extends MultipleFormBuilder
{

    /**
     * The form sections.
     *
     * @var array
     */
    protected $sections = [
        'block' => [
            'fields' => [
                'block_title',
            ],
        ],
    ];
}
