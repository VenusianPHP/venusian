<?php

use Voyager\System\Application;

return Application::configure(basePath: dirname(__DIR__))
    ->withExceptions()
    ->create();
