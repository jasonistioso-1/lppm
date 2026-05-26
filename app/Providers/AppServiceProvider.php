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

            // Automatically run migrations and seed database on production Railway if empty
            try {
                if (!\Illuminate\Support\Facades\Schema::hasTable('publications') || \Illuminate\Support\Facades\DB::table('publications')->count() === 0) {
                    \Illuminate\Support\Facades\Artisan::call('migrate', ['--force' => true]);
                    \Illuminate\Support\Facades\Artisan::call('db:seed', ['--force' => true]);
                }
            } catch (\Exception $e) {
                // Fail silently to avoid breaking page load if database is still building/connecting
            }
        }
    }
}
