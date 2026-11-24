<?php

use App\MainApplication;
use Voyager\Core\VenusianVoyager;
use Voyager\Core\Bootstrap\Exceptions;

return  VenusianVoyager::setup(base_path: dirname(__DIR__))
    ->withExceptions(function (Exceptions $exceptions): void {})
    ->withSignals()
    ->withMainApplication(MainApplication::class)
    ->create();
