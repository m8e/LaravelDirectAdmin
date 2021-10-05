<?php

namespace Octopy\DirectAdmin\Context\Contract;

use Octopy\DirectAdmin\Config\ServerConfig;

interface ContextInterface
{
    /**
     * @return ServerConfig
     */
    public function getConfig() : ServerConfig;
}
