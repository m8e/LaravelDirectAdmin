<?php

namespace Octopy\DirectAdmin\Command\Admin\Contract;

use Closure;
use Octopy\DirectAdmin\Command\Admin\ServiceActionCommand;
use Octopy\DirectAdmin\Context\ItemCollection;

interface ServiceCommandInterface
{
    /**
     * @return ItemCollection
     */
    public function getServices() : ItemCollection;

    /**
     * @return ItemCollection
     */
    public function getStatus() : ItemCollection;

    /**
     * @return ItemCollection
     */
    public function getPids() : ItemCollection;

    /**
     * @return ItemCollection
     */
    public function getMemoryUsage() : ItemCollection;

    /**
     * @param  string       $service
     * @param  Closure|null $action
     * @return ServiceActionCommand|ItemCollection|null
     */
    public function service(string $service, Closure $action = null) : ServiceActionCommand|ItemCollection|null;

    /**
     * @param  string $service
     * @return ItemCollection
     */
    public function startService(string $service) : ItemCollection;

    /**
     * @param  string $service
     * @return ItemCollection
     */
    public function reloadService(string $service) : ItemCollection;

    /**
     * @param  string $service
     * @return ItemCollection
     */
    public function restartService(string $service) : ItemCollection;

    /**
     * @param  string $service
     * @return ItemCollection
     */
    public function stopService(string $service) : ItemCollection;
}
