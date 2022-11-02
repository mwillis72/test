<?php

namespace Modules\Signup\Providers;

use Illuminate\Support\ServiceProvider;

class RegServiceProvider extends ServiceProvider
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
        $this->loadViewsFrom(base_path('Theme/views/signup'), 'signup');
    }
}
