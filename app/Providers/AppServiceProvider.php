<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Corriger un problème avec mysql et la longeur des clés
        // https://webomnizz.com/how-to-fix-laravel-specified-key-was-too-long-error/
        Schema::defaultStringLength(191);
    }
}
