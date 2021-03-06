<?php
/**
 * This file is part of DEZHI.
 *
 * @department : Commercial development.
 * @description : This file is part of [purchase].
 * DEZHI all rights reserved.
 */
namespace Collection\cmbCollectionClient\Base;

use Collection\cmbCollectionClient\Base\Exceptions\ClientError;
use GuzzleHttp\Psr7\Response;

/**
 * Trait MakesHttpRequests.
 */
trait MakesHttpRequests
{
    /**
     * @var bool
     */
    protected $transform = true;

    /**
     * @var string
     */
    protected $baseUri = '';

    /**
     * @throws ClientError
     */
    public function request($method, $uri, array $options = [])
    {
        $url = $this->baseUri . $uri;

        $response = $this->app['http_client']->request($method, $url, $options);

        return $this->transform ? $this->transformResponse($response) : $response;
    }

    /**
     * 原样转发.
     * @throws ClientError
     */
    protected function transformResponse(Response $response)
    {
        return $response->getBody()->getContents();
    }
}
