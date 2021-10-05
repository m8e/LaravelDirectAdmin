<?php

namespace Octopy\DirectAdmin\Context;

use Illuminate\Support\Facades\App;
use Octopy\DirectAdmin\Config\ServerConfig;
use Octopy\DirectAdmin\Context\Contract\ContextInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

abstract class AbstractContext implements ContextInterface
{
    protected HttpClientInterface $client;

    /**
     * @param  ServerConfig $config
     */
    public function __construct(public ServerConfig $config)
    {
        //
    }

    /**
     * @param  string $command
     * @return mixed
     */
    public function makeCommand(string $command) : mixed
    {
        return App::make($command, [
            'context' => $this,
        ]);
    }
}
