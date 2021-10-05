<?php

namespace Octopy\DirectAdmin\Command\Admin;

use Octopy\DirectAdmin\Context\Contract\ContextInterface;
use Octopy\DirectAdmin\Context\ItemCollection;

class ServiceActionCommand extends \Octopy\DirectAdmin\Command\AbstractCommand
{
    /**
     * @param  ContextInterface $context
     * @param  string           $service
     */
    public function __construct(ContextInterface $context, protected string $service)
    {
        parent::__construct($context);
    }

    /**
     * @return ItemCollection
     */
    public function start() : ItemCollection
    {
        return $this->client->get('CMD_API_SERVICE', [
            'action'  => 'start',
            'service' => $this->service,
        ]);
    }

    /**
     * @return ItemCollection
     */
    public function reload() : ItemCollection
    {
        return $this->client->get('CMD_API_SERVICE', [
            'action'  => 'reload',
            'service' => $this->service,
        ]);
    }

    /**
     * @return ItemCollection
     */
    public function restart() : ItemCollection
    {
        return $this->client->get('CMD_API_SERVICE', [
            'action'  => 'restart',
            'service' => $this->service,
        ]);
    }

    /**
     * @return ItemCollection
     */
    public function stop() : ItemCollection
    {
        return $this->client->get('CMD_API_SERVICE', [
            'action'  => 'stop',
            'service' => $this->service,
        ]);
    }
}
