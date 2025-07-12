<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;

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
        //set default carbon ke bahasa Indonesia
        Carbon::setLocale('id');

        //(opsional) kalau pake system local laravel
        App::setLocale('id');
    }
}
