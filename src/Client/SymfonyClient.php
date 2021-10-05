<?php

namespace Octopy\DirectAdmin\Client;

use Illuminate\Support\Facades\Cache;
use Octopy\DirectAdmin\Client\Contract\ClientInterface;
use Octopy\DirectAdmin\Context\ItemCollection;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

class SymfonyClient extends AbstractClient implements ClientInterface
{
    /**
     * @param  string $command
     * @param  array  $query
     * @return ItemCollection
     */
    public function get(string $command, array $query = []) : ItemCollection
    {
        return $this->request('GET', $command, $query);
    }

    /**
     * @param  string $command
     * @param  array  $query
     * @return ItemCollection
     */
    public function post(string $command, array $query = []) : ItemCollection
    {
        return $this->request('POST', $command, $query);
    }

    /**
     * @param  string $method
     * @param  string $command
     * @param  array  $query
     * @return ItemCollection
     */
    public function request(string $method, string $command, array $query = []) : ItemCollection
    {
        if (config('directadmin.cache.enabled', false)) {
            return Cache::remember($command . serialize($query), 3600, fn () : ItemCollection => $this->send($method, $command, $query));
        }

        return $this->send($method, $command, $query);
    }

    /**
     * @param  string $method
     * @param  string $command
     * @param  array  $query
     * @return ItemCollection
     * @throws ClientExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    private function send(string $method, string $command, array $query = []) : ItemCollection
    {
        try {
            $response = $this->client->request($method, $command, [
                'query' => array_merge($query, [
                    'json' => 'yes',
                ]),
            ])
                ->toArray();
        } catch (ServerExceptionInterface $exception) {
            $response = $exception->getResponse()->toArray(false);
        }

        return new ItemCollection($response);
    }
}
