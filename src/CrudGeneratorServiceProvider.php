<?php

namespace Sumanta\CrudGenerator;

use Illuminate\Support\ServiceProvider;

class CrudGeneratorServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/crudgenerator.php' => config_path('crudgenerator.php'),
        ]);

        $this->publishes([
            __DIR__ . '/../publish/views/' => base_path('resources/views/'),
        ]);

        $this->publishes([
            __DIR__ . '/stubs/' => base_path('resources/crud-generator/'),
        ]);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->commands(
            'Sumanta\CrudGenerator\Commands\CrudCommand',
            'Sumanta\CrudGenerator\Commands\CrudControllerCommand',
            'Sumanta\CrudGenerator\Commands\CrudModelCommand',
            'Sumanta\CrudGenerator\Commands\CrudMigrationCommand',
            'Sumanta\CrudGenerator\Commands\CrudViewCommand',
            'Sumanta\CrudGenerator\Commands\CrudLangCommand',
            'Sumanta\CrudGenerator\Commands\CrudApiCommand',
            'Sumanta\CrudGenerator\Commands\CrudApiControllerCommand'
        );
    }
}
