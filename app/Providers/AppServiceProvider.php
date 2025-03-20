<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use App\Models\Logo;

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
        if($this->app->environment('production')) {
            URL::forceScheme('https');
        }
        
        // Tüm viewlara logoları aktarma
        View::composer(['front.includes.navbar', 'front.includes.footer'], function ($view) {
            $logo = Logo::first();
            $view->with('logo', $logo);
        });
    }
}
