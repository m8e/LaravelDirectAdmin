<?php

namespace Octopy\DirectAdmin\Command\Admin;

use Octopy\DirectAdmin\Command\AbstractCommand;
use Octopy\DirectAdmin\Context\Contract\ContextInterface;
use Octopy\DirectAdmin\Context\ItemCollection;

class ServiceActionCommand extends AbstractCommand implements Contract\ServiceActionCommandInterface
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
    public function getSupportedAction() : ItemCollection
    {
        return new ItemCollection($this->context->serviceCommand()->getSupportedActions()->get($this->service));
    }

    /**
     * @param  string $action
     * @return bool
     */
    public function hasAction(string $action) : bool
    {
        return in_array($action, $this->getSupportedAction()->toArray());
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
