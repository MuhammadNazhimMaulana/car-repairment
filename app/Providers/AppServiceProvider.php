<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Repairment;
use App\Observers\TransactionObserver;

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
        Repairment::observe(TransactionObserver::class);
    }
}
