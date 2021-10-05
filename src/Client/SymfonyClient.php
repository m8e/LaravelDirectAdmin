<?php

namespace Octopy\DirectAdmin\Client;

use Illuminate\Support\Facades\Cache;
use Octopy\DirectAdmin\Context\ItemCollection;
use Octopy\DirectAdmin\DirectAdminException;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

class SymfonyClient extends AbstractClient
{
    /**
     * @param  string $command
     * @param  array  $query
     * @return ItemCollection
     * @throws DirectAdminException
     */
    public function get(string $command, array $query = []) : ItemCollection
    {
        return $this->request('GET', $command, [
            'query' => array_merge($query, [
                'json' => 'yes',
            ]),
        ]);
    }

    /**
     * @param  string $command
     * @param  array  $query
     * @return ItemCollection
     * @throws ClientExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     * @throws DirectAdminException
     */
    public function post(string $command, array $query = []) : ItemCollection
    {
        return $this->request('POST', $command, [
            'body' => array_merge($query, [
                'json' => 'yes',
            ]),
        ]);
    }

    /**
     * @param  string $method
     * @param  string $command
     * @param  array  $query
     * @return ItemCollection
     * @throws DirectAdminException
     */
    public function request(string $method, string $command, array $query = []) : ItemCollection
    {
        if (config('directadmin.cache.enabled', false) && ! $this->noCache) {
            return Cache::remember($command . serialize($query), 3600, fn () : ItemCollection => $this->send($method, $command, $query));
        }

        return $this->send($method, $command, $query);
    }

    /**
     * @param  string $method
     * @param  string $command
     * @param  array  $query
     * @return ItemCollection
     * @throws DirectAdminException
     */
    private function send(string $method, string $command, array $query = []) : ItemCollection
    {
        try {
            $response = $this->client->request($method, $command, $query)->toArray();
        } catch (ServerExceptionInterface $exception) {
            $response = $exception->getResponse()->toArray(true);
        } catch (ClientExceptionInterface | DecodingExceptionInterface | RedirectionExceptionInterface | TransportExceptionInterface $exception) {
            throw new DirectAdminException($exception->getMessage(), $exception->getCode());
        }

        return new ItemCollection($response);
    }
}
