<?php

namespace App\Providers;

use App\Models\Superadmin\Settingwebsite;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class SettingwebsiteProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            $setting = Settingwebsite::first();
            $view->with('settingWebsite', $setting);
        });
    }
}
