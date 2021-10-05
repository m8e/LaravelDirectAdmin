<?php

namespace Octopy\DirectAdmin\Tests;

use Illuminate\Foundation\Application;
use Octopy\DirectAdmin\DirectAdminServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
    /**
     * @param  Application $app
     * @return string[]
     */
    protected function getPackageProviders($app) : array
    {
        return [
            DirectAdminServiceProvider::class,
        ];
    }
}
