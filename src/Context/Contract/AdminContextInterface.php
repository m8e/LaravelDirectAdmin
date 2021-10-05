<?php

namespace Octopy\DirectAdmin\Context\Contract;

use Octopy\DirectAdmin\Command\Admin\Contract\ServerCommandInterface;
use Octopy\DirectAdmin\Command\Admin\Contract\ServiceCommandInterface;

interface AdminContextInterface
{
    /**
     * @return ServerCommandInterface
     */
    public function serverCommand() : ServerCommandInterface;

    /**
     * @return ServiceCommandInterface
     */
    public function serviceCommand() : ServiceCommandInterface;
}
