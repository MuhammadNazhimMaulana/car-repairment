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

        // Payment Admin
        $this->app->bind(
            'App\Interfaces\Admin\AdminPaymentInterface',
            'App\Repositories\Admin\AdminPaymentRepository'
        );

        // Payment User
        $this->app->bind(
            'App\Interfaces\User\PaymentInterface',
            'App\Repositories\User\PaymentRepository'
        );

        // Webhook
        $this->app->bind(
            'App\Interfaces\Webhook\WebhookInterface',
            'App\Repositories\Webhook\WebhookRepository'
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
