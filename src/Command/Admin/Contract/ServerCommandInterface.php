<?php

namespace Octopy\DirectAdmin\Command\Admin\Contract;

use Octopy\DirectAdmin\Command\Admin\Collection\ServerItemCollection;
use Octopy\DirectAdmin\Context\ItemCollection;

interface ServerCommandInterface
{
    /**
     * @param  bool $bytes
     * @return ServerItemCollection
     */
    public function getSystemInfo(bool $bytes = true) : ServerItemCollection;

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
