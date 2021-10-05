<?php

namespace Octopy\DirectAdmin;

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
	}
}
