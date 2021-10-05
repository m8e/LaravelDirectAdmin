<?php

namespace Octopy\DirectAdmin\Context\Contract;

use Octopy\DirectAdmin\Command\Admin\Contract\ServiceCommandInterface;

interface AdminContextInterface
{
	/**
	 * @return ServiceCommandInterface
	 */
	public function serviceCommand() : ServiceCommandInterface;
}
