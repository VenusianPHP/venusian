<?php

namespace App\Providers;

use Voyager\NutsAndBolts\AggregateServiceProvider;
use Voyager\NutsAndBolts\ServiceProvider;

class AppServiceProvider extends AggregateServiceProvider
{
    protected array $providers = [
        AppShellServiceProvider::class,
    ];
}
