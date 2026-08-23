<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Additional Sketch Classes
    |--------------------------------------------------------------------------
    |
    | List fully-qualified Sketch class names that should be registered when
    | the application boots. Each class must declare the #[Sketch('name')]
    | attribute. Conventional app/Runner/Sketches discovery does not require this.
    |
    */

    'load' => [
        // \App\Other\MyAttributedSketch::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Global Runner Middleware
    |--------------------------------------------------------------------------
    |
    | Middleware runs through voyager/pipeline around each sketch invocation.
    | Destination is SketchRunner::run(). Default stack is empty.
    |
    */

    'middleware' => [
        // \App\Runner\Middleware\Example::class,
    ],

];
