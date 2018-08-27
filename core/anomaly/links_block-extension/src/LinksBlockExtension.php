<?php namespace Anomaly\LinksBlockExtension;

use Anomaly\BlocksModule\Block\BlockExtension;
use Anomaly\LinksBlockExtension\Block\BlockModel;

/**
 * Class LinksBlockExtension
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class LinksBlockExtension extends BlockExtension
{

    /**
     * This extension provides a links
     * block for the Blocks Module.
     *
     * @var string
     */
    protected $provides = 'anomaly.module.blocks::block.links';

    /**
     * The block view.
     *
     * @var string
     */
    protected $view = 'anomaly.extension.links_block::content';

    /**
     * The block model.
     *
     * @var string
     */
    protected $model = BlockModel::class;

}
