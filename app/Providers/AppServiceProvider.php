<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\URL;

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
        $host = request()->getHost();
        if (!in_array($host, ['localhost', '127.0.0.1']) && !str_ends_with($host, '.test')) {
            URL::forceScheme('https');
        }
    }
}
