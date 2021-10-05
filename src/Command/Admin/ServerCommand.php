<?php

namespace Octopy\DirectAdmin\Command\Admin;

use Octopy\DirectAdmin\Command\AbstractCommand;
use Octopy\DirectAdmin\Command\Admin\Collection\ServerItemCollection;
use Octopy\DirectAdmin\Command\Admin\Contract\ServerCommandInterface;
use Octopy\DirectAdmin\Context\ItemCollection;
use Octopy\DirectAdmin\DirectAdminException;

class ServerCommand extends AbstractCommand implements ServerCommandInterface
{
    /**
     * @var bool
     */
    protected bool $dontAskPassword = false;

    /**
     * @param  bool $bytes
     * @return ServerItemCollection
     * @throws DirectAdminException
     */
    public function getSystemInfo(bool $bytes = true) : ServerItemCollection
    {
        return new ServerItemCollection(
            $this->client->get('CMD_API_SYSTEM_INFO', [
                'bytes' => $bytes ? 'yes' : 'no',
            ])
        );
    }

    /**
     * @param  string|null $password
     * @return ItemCollection
     * @throws DirectAdminException
     */
    public function reboot(string $password = null) : ItemCollection
    {
        if ($this->dontAskPassword) {
            $password = $this->context->getApp()->getConfig()->getPassword();
        }

        if (! $this->dontAskPassword && ! $password) {
            throw new DirectAdminException('Please provide password for rebooting server or use dontAskPassword().');
        }

        return $this->client->noCache()->post('CMD_API_REBOOT', [
            'passwd' => $password,
        ]);
    }

    /**
     * @return ServerCommandInterface
     */
    public function dontAskPassword() : ServerCommandInterface
    {
        $this->dontAskPassword = true;

        return $this;
    }
}
