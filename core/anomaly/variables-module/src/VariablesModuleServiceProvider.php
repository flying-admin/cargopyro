<?php namespace Anomaly\VariablesModule;

use Anomaly\Streams\Platform\Addon\AddonServiceProvider;
use Anomaly\Streams\Platform\Assignment\AssignmentRouter;
use Anomaly\Streams\Platform\Field\FieldRouter;
use Anomaly\VariablesModule\Http\Controller\Admin\AssignmentsController;
use Anomaly\VariablesModule\Http\Controller\Admin\FieldsController;
use Anomaly\VariablesModule\Variable\Contract\VariableRepositoryInterface;
use Anomaly\VariablesModule\Variable\VariableRepository;

/**
 * Class VariablesModuleServiceProvider
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class VariablesModuleServiceProvider extends AddonServiceProvider
{

    /**
     * Plugins provided by the addon.
     *
     * @var array
     */
    protected $plugins = [
        VariablesModulePlugin::class,
    ];

    /**
     * The addon routes.
     *
     * @var array
     */
    protected $routes = [
        'admin/variables'                  => 'Anomaly\VariablesModule\Http\Controller\Admin\VariablesController@index',
        'admin/variables/edit/{id}'        => 'Anomaly\VariablesModule\Http\Controller\Admin\VariablesController@edit',
        'admin/variables/groups'           => 'Anomaly\VariablesModule\Http\Controller\Admin\GroupsController@index',
        'admin/variables/groups/create'    => 'Anomaly\VariablesModule\Http\Controller\Admin\GroupsController@create',
        'admin/variables/groups/edit/{id}' => 'Anomaly\VariablesModule\Http\Controller\Admin\GroupsController@edit',
    ];

    /**
     * The singleton bindings.
     *
     * @var array
     */
    protected $singletons = [
        VariableRepositoryInterface::class => VariableRepository::class,
    ];

    /**
     * Map the addon.
     *
     * @param FieldRouter      $fields
     * @param AssignmentRouter $assignments
     */
    public function map(FieldRouter $fields, AssignmentRouter $assignments)
    {
        $fields->route($this->addon, FieldsController::class);
        $assignments->route($this->addon, AssignmentsController::class, 'admin/variables/groups');
    }
}
