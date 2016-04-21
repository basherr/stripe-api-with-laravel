<?php

namespace App\Providers;

use App\Repository\Classes;
use Illuminate\Support\ServiceProvider;

class BillingServiceProvider extends ServiceProvider
{
    protected $defer = true;

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('BillingInterface', 'App\Repository\Classes\StripeBilling');
    }
    /**
     * Get the serivce provided the provider
     *
     * @param null
     * @return array
     */
    public function provides()
    {
        return ['app\Repository\Interfaces\BillingInterface'];
    }
}
