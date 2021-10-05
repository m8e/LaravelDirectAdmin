<?php

namespace Octopy\DirectAdmin\Command\Admin\Contract;

use Octopy\DirectAdmin\Context\ItemCollection;

interface ServerCommandInterface
{
    /**
     * @param  string|null $password
     * @return ItemCollection
     */
    public function reboot(string $password = null) : ItemCollection;

    /**
     * @return ServerCommandInterface
     */
    public function dontAskPassword() : ServerCommandInterface;
}
