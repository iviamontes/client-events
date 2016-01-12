<?php namespace iviamontes\Events\Facades;

/**
 * User: iviamontes
 * Date: 1/11/16
 * Time: 4:37 PM
 */

use Illuminate\Support\Facades\Facade;

class ClientEvents extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'client.events';
    }
}