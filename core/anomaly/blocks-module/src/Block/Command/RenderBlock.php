<?php namespace Anomaly\BlocksModule\Block\Command;

use Anomaly\BlocksModule\Block\BlockExtension;
use Anomaly\BlocksModule\Block\Contract\BlockInterface;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class RenderBlock
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class RenderBlock
{

    use DispatchesJobs;

    /**
     * The block instance.
     *
     * @var BlockInterface
     */
    protected $block;

    /**
     * Create a new RenderBlock instance.
     *
     * @param BlockInterface $block
     */
    public function __construct(BlockInterface $block)
    {
        $this->block = $block;
    }

    /**
     * Handle the command.
     *
     * @param Factory $view
     * @return null|string
     */
    public function handle(Factory $view)
    {
        /* @var BlockExtension $extension */
        $extension = $this->block->extension();

        if (!$extension->getView()) {
            return null;
        }

        return $view->make(
            $extension->getWrapper(),
            [
                'block'   => $this->block,
                'content' => $this->block->getContent(),
            ]
        )->render();
    }
}
