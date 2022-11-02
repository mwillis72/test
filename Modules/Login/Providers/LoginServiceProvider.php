<?php

namespace Modules\Login\Providers;

use Illuminate\Support\ServiceProvider;

class LoginServiceProvider extends ServiceProvider
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
        // this deifines where our views are loaded from with the corresponding namespace
        $this->loadViewsFrom(base_path('Theme/views/login'), 'login');
    }
}
