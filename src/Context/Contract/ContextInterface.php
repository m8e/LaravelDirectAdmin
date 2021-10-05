<?php

namespace Octopy\DirectAdmin\Context\Contract;

interface ContextInterface
{
    /**
     * @param  string $server
     * @return ContextInterface
     */
    public function server(string $server) : ContextInterface;
}
