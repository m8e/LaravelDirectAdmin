<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Default DirectAdmin Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the database connections below you wish
    | to use as your default connection for all database work. Of course
    | you may use many connections at once using the Database library.
    |
    */
    'default' => env('DIRECTADMIN_SERVER', 'default'),

    /*
    |--------------------------------------------------------------------------
    | DirectAdmin Server Connection
    |--------------------------------------------------------------------------
    |
    | Here are each of the directadmin server connections setup for your application.
    |
   */
    'servers' => [
        'default' => new \Octopy\DirectAdmin\Config\ServerConfig(
            [
                'host' => env('DIRECTADMIN_HOST'),
                'port' => env('DIRECTADMIN_PORT', 2222),
            ],
            [
                'username' => env('DIRECTADMIN_USERNAME'),
                'password' => env('DIRECTADMIN_PASSWORD'),
            ]
        ),

        'other-server' => new \Octopy\DirectAdmin\Config\ServerConfig(
            [
                'host' => env('OTHER_DIRECTADMIN_HOST'),
                'port' => env('OTHER_DIRECTADMIN_PORT', 2222),
            ],
            [
                'username' => env('OTHER_DIRECTADMIN_USERNAME'),
                'password' => env('OTHER_DIRECTADMIN_PASSWORD'),
            ]
        ),
    ],

    'cache' => [
        'enabled'  => false,
        'lifetime' => 1337,
    ],
];
