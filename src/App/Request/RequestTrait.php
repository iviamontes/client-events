<?php namespace iviamontes\Events\App\Request;

/**
 * Created by PhpStorm.
 * User: iviamontes
 * Date: 1/12/16
 * Time: 3:25 PM
 */


use Illuminate\Support\Facades\Config;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use iviamontes\Events\App\Exceptions\EventsRequestException;

trait RequestTrait
{
    public function request($method = 'post', $uri, array $payload = [], $debug = false)
    {
        $client = new Client();

        $method = strtolower($method);

        try
        {
            $res = $client->$method($this->baseUrl() . $uri, [
                'debug'     => $debug,
                'body'      => $payload,
                'headers'   => $this->header()
            ]);

            return json_decode($res->getBody());
        }
        catch (RequestException $e)
        {
            throw new EventsRequestException($e->getMessage(), $e->getCode());
        }
    }

    private function baseUrl()
    {
        return trim(Config::get('client_events.SERVER_URL_BASE'), '/');
    }

    private function header()
    {
        return ['X-Authorization' => $this->key()];
    }

    private function key()
    {
        return Config::get('client_events.APP_KEY');
    }
}