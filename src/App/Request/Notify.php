<?php namespace iviamontes\Events\App\Request;
;

/**
 * Created by PhpStorm.
 * User: iviamontes
 * Date: 1/12/16
 * Time: 3:22 PM
 */


use iviamontes\Events\App\Request\RequestTrait;
use iviamontes\Events\App\Exceptions\EventsRequestException;

class Notify
{

    use RequestTrait;

    /**
     * Notifies subscribers
     *
     * [
     *  'payload' => ['hello' => 'world'],
     *  'event'   => 'My Event',
     *  'channel' => 'Channel Name',
     *  'push'    => [id1,id2] | "All"
     * ]
     *
     * @param $payload
     * @return array|mixed
     */
    public function notify($payload)
    {

        try
        {
            $response = $this->request('post', '/event', $payload);

            return ['success' => true, "response" => $response];
        }
        catch(EventsRequestException $e)
        {
            return ['success' => false, 'message' => $e->getMessage(), 'code' => $e->getCode()];
        }
    }
}