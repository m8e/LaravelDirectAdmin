<?php

namespace Octopy\DirectAdmin\Command\Admin;

use Closure;
use Octopy\DirectAdmin\Command\AbstractCommand;
use Octopy\DirectAdmin\Command\Admin\Contract\ServiceCommandInterface;
use Octopy\DirectAdmin\Context\ItemCollection;

class ServiceCommand extends AbstractCommand implements ServiceCommandInterface
{
    /**
     * @return ItemCollection
     */
    public function getServices() : ItemCollection
    {
        return $this->client->get('CMD_SHOW_SERVICES');
    }

    /**
     * @return ItemCollection
     */
    public function getStatus() : ItemCollection
    {
        return new ItemCollection($this->getServices()->get('status'));
    }

    /**
     * @return ItemCollection
     */
    public function getPids() : ItemCollection
    {
        return new ItemCollection($this->getServices()->get('pids'));
    }

    /**
     * @return ItemCollection
     */
    public function getMemoryUsage() : ItemCollection
    {
        return new ItemCollection($this->getServices()->get('memory'));
    }

    /**
     * @param  string       $service
     * @param  Closure|null $action
     * @return ServiceActionCommand|ItemCollection|null
     */
    public function service(string $service, Closure $action = null) : ServiceActionCommand|ItemCollection|null
    {
        $service = new ServiceActionCommand($this->context, $service);
        if ($action) {
            return $action($service);
        }

        return $service;
    }

    /**
     * @param  string $service
     * @return ItemCollection
     */
    public function startService(string $service) : ItemCollection
    {
        return $this->service($service)->start();
    }

    /**
     * @param  string $service
     * @return ItemCollection
     */
    public function reloadService(string $service) : ItemCollection
    {
        return $this->service($service)->reload();
    }

    /**
     * @param  string $service
     * @return ItemCollection
     */
    public function restartService(string $service) : ItemCollection
    {
        return $this->service($service)->restart();
    }

    /**
     * @param  string $service
     * @return ItemCollection
     */
    public function stopService(string $service) : ItemCollection
    {
        return $this->service($service)->stop();
    }
}
