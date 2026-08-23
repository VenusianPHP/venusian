<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Async Runtime
    |--------------------------------------------------------------------------
    |
    | This option determines the runtime that drives asynchronous nodes and
    | flows. The "sync" runtime needs nothing beyond PHP and runs every step
    | on the calling stack, which keeps behaviour deterministic.
    |
    | The "fiber" runtime overlaps work using native PHP fibers. The "react"
    | runtime needs the "react/async" package.
    |
    | Supported: "sync", "fiber", "react"
    |
    */

    'runtime' => env('WORKFLOWS_RUNTIME', 'sync'),

];
