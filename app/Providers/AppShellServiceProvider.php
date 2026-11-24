<?php

namespace App\Providers;

use Exception;
use ReflectionException;
use Voyager\Contracts\NutsAndBolts\ApplicationShell;
use Voyager\NutsAndBolts\ServiceProvider;

class AppShellServiceProvider extends ServiceProvider
{
    /**
     * @throws ReflectionException
     */
    public function register(): void
    {
        $this->app->registerSingleton(ApplicationShell::class, fn () => match ($this->mode()) {

            // @todo - add ApplicationShell(s) here

            default => throw new Exception("[{$this->mode()}] is not a supported mode")
        });
    }

    /**
     * @throws ReflectionException
     */
    private function mode(): string
    {
        return (string) config('main.presentation.mode', '');
    }
}
