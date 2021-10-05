<?php

namespace Octopy\DirectAdmin\Command\Admin\Contract;

use Octopy\DirectAdmin\Context\ItemCollection;

interface ServiceActionCommandInterface
{
    /**
     * @return ItemCollection
     */
    public function getSupportedAction() : ItemCollection;

    /**
     * @param  string $action
     * @return bool
     */
    public function hasAction(string $action) : bool;

    /**
     * @return ItemCollection
     */
    public function start() : ItemCollection;

    /**
     * @return ItemCollection
     */
    public function reload() : ItemCollection;

    /**
     * @return ItemCollection
     */
    public function restart() : ItemCollection;

    /**
     * @return ItemCollection
     */
    public function stop() : ItemCollection;
}
