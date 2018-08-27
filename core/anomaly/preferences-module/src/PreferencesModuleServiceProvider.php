<?php namespace Anomaly\PreferencesModule;

use Anomaly\PreferencesModule\Preference\Contract\PreferenceRepositoryInterface;
use Anomaly\PreferencesModule\Preference\Listener\ConfigureSystem;
use Anomaly\PreferencesModule\Preference\PreferenceModel;
use Anomaly\PreferencesModule\Preference\PreferenceRepository;
use Anomaly\Streams\Platform\Addon\AddonServiceProvider;
use Anomaly\Streams\Platform\Event\Response;
use Anomaly\Streams\Platform\Model\Preferences\PreferencesPreferencesEntryModel;

/**
 * Class PreferencesModuleServiceProvider
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class PreferencesModuleServiceProvider extends AddonServiceProvider
{

    /**
     * The addon plugins.
     *
     * @var array
     */
    protected $plugins = [
        PreferencesModulePlugin::class,
    ];

    /**
     * The addon listeners.
     *
     * @var array
     */
    protected $listeners = [
        Response::class => [
            ConfigureSystem::class,
        ],
    ];

    /**
     * The addon routes.
     *
     * @var array
     */
    protected $routes = [
        'admin/preferences'                => 'Anomaly\PreferencesModule\Http\Controller\Admin\SystemController@edit',
        'admin/preferences/{type}'         => 'Anomaly\PreferencesModule\Http\Controller\Admin\AddonsController@index',
        'admin/preferences/{type}/{addon}' => 'Anomaly\PreferencesModule\Http\Controller\Admin\AddonsController@edit',
    ];

    /**
     * The class bindings.
     *
     * @var array
     */
    protected $bindings = [
        PreferencesPreferencesEntryModel::class => PreferenceModel::class,
    ];

    /**
     * The singleton bindings.
     *
     * @var array
     */
    protected $singletons = [
        PreferenceRepositoryInterface::class => PreferenceRepository::class,
    ];
}
