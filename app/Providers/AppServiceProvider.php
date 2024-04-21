<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        // Share user's username with all views
        View::composer('*', function ($view) {
            $pseudo = Auth::check() ? Auth::user()->u_pseudo : null;
            $view->with('pseudo', $pseudo);
        });
    }
}
