<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Interfaces\ExampleInterface',
            'App\Repositories\ExampleRepository'
        );
        
        // Profile
        $this->app->bind(
            'App\Interfaces\User\ProfileInterface',
            'App\Repositories\User\ProfileRepository'
        );

        // Service
        $this->app->bind(
            'App\Interfaces\User\RepairmentInterface',
            'App\Repositories\User\RepairmentRepository'
        );

        // Payment
        $this->app->bind(
            'App\Interfaces\Admin\PaymentInterface',
            'App\Repositories\Admin\PaymentRepository'
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
