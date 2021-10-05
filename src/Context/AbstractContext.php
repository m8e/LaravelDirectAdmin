<?php

namespace Octopy\DirectAdmin\Context;

use Illuminate\Support\Facades\App;
use Octopy\DirectAdmin\Context\Contract\ContextInterface;
use Octopy\DirectAdmin\DirectAdmin;

abstract class AbstractContext implements ContextInterface
{
    /**
     * @param  DirectAdmin $app
     */
    public function __construct(protected DirectAdmin $app)
    {
        //
    }

    /**
     * @return DirectAdmin
     */
    public function getApp() : DirectAdmin
    {
        return $this->app;
    }

    /**
     * @param  string $command
     * @return mixed
     */
    protected function makeCommand(string $command) : mixed
    {
        return App::make($command, [
            'context' => $this,
        ]);
    }
}
