<?php

namespace Octopy\DirectAdmin\Context\Contract;

use Octopy\DirectAdmin\DirectAdmin;

interface ContextInterface
{
    /**
     * @return DirectAdmin
     */
    public function getApp() : DirectAdmin;

    /**
     * @param  string $server
     * @return ContextInterface
     */
    public function server(string $server) : ContextInterface;
}
