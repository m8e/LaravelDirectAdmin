<?php

namespace Octopy\DirectAdmin\Client;

use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\HttpClientInterface;

abstract class AbstractClient
{
    /**
     * @var HttpClientInterface
     */
    protected HttpClientInterface $client;

    /**
     * @param  array $config
     */
    public function __construct(array $config)
    {
        $this->client = HttpClient::create($config);
    }
}
