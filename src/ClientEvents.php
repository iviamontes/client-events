<?php namespace iviamontes\Events;

/**
 * Created by PhpStorm.
 * User: iviamontes
 * Date: 1/11/16
 * Time: 4:43 PM
 */


use iviamontes\Events\App\Request\Notify;
use iviamontes\Events\App\Request\Subscription;

class ClientEvents
{

    /** @var   */
    private $subscriptionRequest;


    /** @var   */
    private $notifyRequest;

    public function __construct()
    {
        $this->subscriptionRequest = new Subscription();

        $this->notifyRequest = new Notify();
    }


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
        dd( $this->subscriptionRequest->subscribe($payload) );
    }

    /**
     * Removes the subscription
     *
     * @param $subscriptionId
     * @return array|mixed
     */
    public function unSubscribe($subscriptionId)
    {
        return $this->subscriptionRequest->unSubscribe($subscriptionId);
    }


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
        return $this->notifyRequest->notify($payload);
    }

}