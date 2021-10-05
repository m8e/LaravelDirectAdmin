<?php

namespace Octopy\DirectAdmin\Context;

use Octopy\DirectAdmin\Command\Admin\Contract\ServiceCommandInterface;
use Octopy\DirectAdmin\Command\Admin\ServiceCommand;
use Octopy\DirectAdmin\Config\ServerConfig;
use Octopy\DirectAdmin\Context\Contract\AdminContextInterface;

class AdminContext extends AbstractContext implements AdminContextInterface
{
    /**
     * @return ServiceCommandInterface
     */
    public function serviceCommand() : ServiceCommandInterface
    {
        return $this->makeCommand(ServiceCommand::class);
    }

    /**
     * @return ServerConfig
     */
    public function getConfig() : ServerConfig
    {
        return $this->config;
    }
}
