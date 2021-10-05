<?php

namespace Octopy\DirectAdmin\Context;

use Octopy\DirectAdmin\Command\Admin\Contract\ServiceCommandInterface;
use Octopy\DirectAdmin\Command\Admin\ServiceCommand;
use Octopy\DirectAdmin\Context\Contract\AdminContextInterface;
use Octopy\DirectAdmin\Context\Contract\ContextInterface;

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
     * @param  string $server
     * @return ContextInterface
     */
    public function server(string $server) : ContextInterface
    {
        return $this->app->server($server)->adminContext();
    }
}
