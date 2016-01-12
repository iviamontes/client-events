<?php namespace iviamontes\Events\App\Request;

/**
 * Created by PhpStorm.
 * User: iviamontes
 * Date: 1/12/16
 * Time: 3:17 PM
 */

use iviamontes\Events\App\Request\RequestTrait;
use iviamontes\Events\App\Exceptions\EventsRequestException;

class Subscription
{

    use RequestTrait;

    /**
     * Creates a subscription
     *
     * [
     *  "deviceToken"   => "43dSD1232dsa23",
     *  "channel"       => "channel Name",
     *  "deviceType"    => "ios|android"
     * ]
     *
     * @param array $payload
     * @return array
     */
    public function subscribe($payload)
    {
        try
        {
            $response = $this->request('post', "/subscriptions", $payload);

            return ['success' => true, 'response' => $response];
        }
        catch(EventsRequestException $e)
        {
            return ['success' => false, 'message' => $e->getMessage(), 'code' => $e->getCode()];
        }
    }

    /**
     * Removes the subscription
     *
     * @param $subscriptionId
     * @return array|mixed
     */
    public function unSubscribe($subscriptionId)
    {
        try
        {
            $this->request('delete', "/subscriptions/{$subscriptionId}");

            return ['success' => true, "response" => $subscriptionId];
        }
        catch(EventsRequestException $e)
        {
            return ['success' => false, 'message' => $e->getMessage(), 'code' => $e->getCode()];
        }
    }
}