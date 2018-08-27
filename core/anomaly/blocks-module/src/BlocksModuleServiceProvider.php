<?php namespace Anomaly\BlocksModule;

use Anomaly\BlocksModule\Area\AreaModel;
use Anomaly\BlocksModule\Area\AreaRepository;
use Anomaly\BlocksModule\Area\Contract\AreaRepositoryInterface;
use Anomaly\BlocksModule\Block\BlockModel;
use Anomaly\BlocksModule\Block\BlockRepository;
use Anomaly\BlocksModule\Block\Contract\BlockRepositoryInterface;
use Anomaly\Streams\Platform\Addon\AddonCollection;
use Anomaly\Streams\Platform\Addon\AddonIntegrator;
use Anomaly\Streams\Platform\Addon\AddonServiceProvider;
use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;
use Anomaly\Streams\Platform\Entry\EntryModel;
use Anomaly\Streams\Platform\Model\Blocks\BlocksAreasEntryModel;

/**
 * Class BlocksModuleServiceProvider
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class BlocksModuleServiceProvider extends AddonServiceProvider
{

    /**
     * The addon plugins.
     *
     * @var array
     */
    protected $plugins = [
        BlocksModulePlugin::class,
    ];

    /**
     * The addon routes.
     *
     * @var array
     */
    protected $routes = [
        'admin/blocks'                  => 'Anomaly\BlocksModule\Http\Controller\Admin\AreasController@index',
        'admin/blocks/create'           => 'Anomaly\BlocksModule\Http\Controller\Admin\AreasController@create',
        'admin/blocks/choose'           => 'Anomaly\BlocksModule\Http\Controller\Admin\AreasController@choose',
        'admin/blocks/edit/{id}'        => 'Anomaly\BlocksModule\Http\Controller\Admin\AreasController@edit',
        'admin/blocks/{area}'           => 'Anomaly\BlocksModule\Http\Controller\Admin\BlocksController@index',
        'admin/blocks/{area}/create'    => 'Anomaly\BlocksModule\Http\Controller\Admin\BlocksController@create',
        'admin/blocks/{area}/choose'    => 'Anomaly\BlocksModule\Http\Controller\Admin\BlocksController@choose',
        'admin/blocks/{area}/edit/{id}' => 'Anomaly\BlocksModule\Http\Controller\Admin\BlocksController@edit',
    ];

    /**
     * The addon bindings.
     *
     * @var array
     */
    protected $bindings = [
        BlocksAreasEntryModel::class => AreaModel::class,
    ];

    /**
     * The singleton bindings.
     *
     * @var array
     */
    protected $singletons = [
        AreaRepositoryInterface::class  => AreaRepository::class,
        BlockRepositoryInterface::class => BlockRepository::class,
    ];

    /**
     * Register the addon.
     *
     * @param AddonIntegrator $integrator
     * @param AddonCollection $addons
     * @param EntryModel      $model
     */
    public function register(
        EntryModel $model
    ) {
        $model->bind(
            'blocks',
            function ($field = 'blocks') {

                /* @var EntryInterface $this */
                $field = $this->getField($field);

                return $this
                    ->morphMany(BlockModel::class, 'area', 'area_type')
                    ->where('field_id', $field->getId());
            }
        );

        $model->bind(
            'get_blocks',
            function ($field = 'blocks') {

                /* @var EntryInterface $this */
                return $this
                    ->call('blocks', compact('field'))
                    ->getResults();
            }
        );
    }

}
