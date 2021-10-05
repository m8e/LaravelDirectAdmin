<?php

namespace Octopy\DirectAdmin\Command;

use Octopy\DirectAdmin\Client\Contract\ClientInterface;
use Octopy\DirectAdmin\Client\SymfonyClient;
use Octopy\DirectAdmin\Context\Contract\ContextInterface;

abstract class AbstractCommand
{
    /**
     * @var ClientInterface|SymfonyClient
     */
    protected ClientInterface|SymfonyClient $client;

    /**
     * @param  ContextInterface $context
     */
    public function __construct(protected ContextInterface $context)
    {
        $this->client = new SymfonyClient([
            'base_uri'   => $this->context->getApp()->getConfig()->getConnection(),
            'auth_basic' => $this->context->getApp()->getConfig()->getCredential(),
        ]);
    }
}
