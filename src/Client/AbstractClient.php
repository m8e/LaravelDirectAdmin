<?php

namespace Octopy\DirectAdmin\Client;

use Octopy\DirectAdmin\Client\Contract\ClientInterface;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\HttpClientInterface;

abstract class AbstractClient implements ClientInterface
{
    /**
     * @var bool
     */
    protected bool $noCache = false;

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

    /**
     * @return ClientInterface
     */
    public function noCache() : ClientInterface
    {
        $this->noCache = true;

        return $this;
    }
}
