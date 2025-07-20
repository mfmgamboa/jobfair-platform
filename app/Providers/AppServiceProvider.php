<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::component('components.label', 'label');
        Blade::component('components.input', 'input');
        Blade::component('components.button', 'button');
        Blade::component('components.auth-card', 'auth-card');
        Blade::component('components.auth-session-status', 'auth-session-status');
        Blade::component('components.auth-validation-errors', 'auth-validation-errors');
    }
}
