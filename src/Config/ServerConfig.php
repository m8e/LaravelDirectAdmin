<?php

namespace Octopy\DirectAdmin\Config;

class ServerConfig
{
    /**
     * @param  array $connection
     * @param  array $credential
     */
    public function __construct(protected array $connection = [], protected array $credential = [])
    {
        //
    }

    /**
     * @param  string $host
     * @param  int    $port
     */
    public function setConnection(string $host, int $port = 2222)
    {
        $this->connection = compact('host', 'port');
    }

    /**
     * @param  string $username
     * @param  string $password
     */
    public function setCredential(string $username, string $password)
    {
        $this->credential = compact('username', 'password');
    }

    /**
     * @return ServerConfig
     */
    public function getDefaultServer() : ServerConfig
    {
        return $this->getServer(config('directadmin.default', 'default'));
    }

    /**
     * @param  string $server
     * @return ServerConfig
     */
    public function getServer(string $server) : ServerConfig
    {
        return config('directadmin.servers.' . $server);
    }

    /**
     * @return string
     */
    public function getConnection() : string
    {
        return trim($this->connection['host'], '/') . ':' . $this->connection['port'];
    }

    /**
     * @return string
     */
    public function getUsername() : string
    {
        return $this->credential['username'];
    }

    /**
     * @return string
     */
    public function getPassword() : string
    {
        return $this->credential['password'];
    }

    /**
     * @return array
     */
    public function getCredential() : array
    {
        return [
            $this->getUsername(), $this->getPassword(),
        ];
    }

    /**
     * @return bool
     */
    public function cacheEnabled() : bool
    {
        return config('directadmin.cache.enabled', false);
    }
}
