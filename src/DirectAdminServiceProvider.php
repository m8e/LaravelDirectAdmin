<?php

namespace Octopy\DirectAdmin;

use Octopy\DirectAdmin\Context\AdminContext;
use Octopy\DirectAdmin\Context\Contract\AdminContextInterface;

class DirectAdminServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * @return void
     */
    public function register() : void
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/directadmin.php', 'directadmin'
        );

        $this->app->alias(AdminContext::class, AdminContextInterface::class);
    }
}
