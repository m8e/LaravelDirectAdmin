<?php

namespace Octopy\DirectAdmin;

use Illuminate\Support\Facades\App;
use Octopy\DirectAdmin\Config\ServerConfig;
use Octopy\DirectAdmin\Context\AdminContext;
use Octopy\DirectAdmin\Context\Contract\ContextInterface;

class DirectAdmin
{
    /**
     * @var ServerConfig
     */
    protected ServerConfig $config;

    /**
     * @param  ServerConfig|string|null $config
     */
    public function __construct(ServerConfig|string|null $config = null)
    {
        if (! $config) {
            $config = App::make(ServerConfig::class)->getDefaultServer();
        }

        if (is_string($config)) {
            $config = App::make(ServerConfig::class)->getServer($config);
        }

        $this->config = $config;
    }

    /**
     * @return ServerConfig|string|null
     */
    public function getConfig() : ServerConfig|string|null
    {
        return $this->config;
    }

    /**
     * @param  ServerConfig|string $config
     * @return DirectAdmin
     */
    public function server(ServerConfig|string $config) : DirectAdmin
    {
        return new static($config);
    }

    /**
     * @param  ContextInterface|string $context
     * @return ContextInterface
     */
    public function context(ContextInterface|string $context) : AdminContext
    {
        if (is_string($context)) {
            return App::make($context, [
                'app' => $this,
            ]);
        }

        return $context;
    }

    /**
     * @return ContextInterface|AdminContext
     */
    public function adminContext() : ContextInterface|AdminContext
    {
        return $this->context(AdminContext::class);
    }
}
