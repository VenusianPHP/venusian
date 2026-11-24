<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | The title the main application presents, such as its first window's
    | title when a presentation package opens one.
    |
    */

    'title' => env('APP_TITLE', 'VenusianPHP Presents!'),

    /*
    |--------------------------------------------------------------------------
    | Version
    |--------------------------------------------------------------------------
    |
    | The application's own version, for the application to show.
    |
    */

    'version' => env('APP_VERSION', '0.1.0'),

    /*
    |--------------------------------------------------------------------------
    | Database
    |--------------------------------------------------------------------------
    |
    | When true, the main application creates its sqlite file if missing and
    | runs pending migrations from database/migrations before startup().
    |
    */

    'use_database' => false,

    /*
    |--------------------------------------------------------------------------
    | Memory Limit
    |--------------------------------------------------------------------------
    |
    | PHP's memory_limit, set by App\Providers\AppServiceProvider when the
    | application registers its providers.
    |
    */

    'runtime_memory_limit' => env('RUNTIME_MEMORY_LIMIT', '512M'),

    'presentation' => [
        'mode' => 'none'
    ]
];
