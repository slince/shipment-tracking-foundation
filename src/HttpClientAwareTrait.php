<?php
/**
 * Slince shipment tracker library
 * @author Tao <taosikai@yeah.net>
 */
namespace Slince\ShipmentTracking\Foundation;

use GuzzleHttp\Client as HttpClient;

trait HttpClientAwareTrait
{
    /**
     * @var HttpClient
     */
    protected $httpClient;

    /**
     * Sets the http client
     * @param HttpClient $httpClient
     */
    public function setHttpClient(HttpClient $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    /**
     * Gets the http client
     * @return HttpClient
     */
    public function getHttpClient()
    {
        if (!is_null($this->httpClient)) {
            return $this->httpClient;
        }
        return $this->httpClient = new HttpClient();
    }
}