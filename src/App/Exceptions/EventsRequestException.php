<?php namespace iviamontes\Events\App\Exceptions;

/**
 * Created by PhpStorm.
 * User: iviamontes
 * Date: 1/12/16
 * Time: 3:53 PM
 */
class EventsRequestException extends \Exception
{
    public function __construct($message = "", $code = 0, $previous = null)
    {
        return parent::__construct($message, $code, $previous);
    }
}