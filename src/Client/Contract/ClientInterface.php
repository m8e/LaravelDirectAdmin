<?php

namespace Octopy\DirectAdmin\Client\Contract;

use Octopy\DirectAdmin\Context\ItemCollection;

interface ClientInterface
{
    /**
     * @return ClientInterface
     */
    public function noCache() : ClientInterface;

    /**
     * @param  string $command
     * @param  array  $query
     * @return ItemCollection
     */
    public function get(string $command, array $query = []) : ItemCollection;

    /**
     * @param  string $command
     * @param  array  $query
     * @return ItemCollection
     */
    public function post(string $command, array $query = []) : ItemCollection;

    /**
     * @param  string $method
     * @param  string $command
     * @param  array  $query
     * @return ItemCollection
     */
    public function request(string $method, string $command, array $query = []) : ItemCollection;
}
