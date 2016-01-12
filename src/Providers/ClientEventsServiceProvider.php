<?php namespace iviamontes\Events\Providers;

/**
 * User: iviamontes
 * Date: 1/11/16
 * Time: 4:22 PM
 */

use Illuminate\Support\ServiceProvider;

class ClientEventsServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->publishes([$this->configPath() => config_path('client_events.php')] , 'config');

        $this->publishes([ $this->migrationsPath() => database_path('migrations')], 'migrations');
    }

    public function register()
    {
        $this->app->bind('client.events', 'iviamontes\Events\ClientEvents');
    }


    private  function configPath()
    {
        return __DIR__ . '/../../config/client_events.php';
    }

    private  function migrationsPath()
    {
        return __DIR__ . '/../../database/migrations/';
    }
}