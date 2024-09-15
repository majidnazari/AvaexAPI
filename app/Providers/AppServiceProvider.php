<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];
    /**
     * Register any application services.
     */
    public function register(): void
    {

        $this->app->bind('PostService', function ($app) {
            return new \App\Services\PostService(); // Update the namespace if necessary
        });
        $this->app->bind('TipaxService', function ($app) {
            return new \App\Services\TipaxService(); // Update the namespace if necessary
        });
        // $this->app->singleton('Post.auth', function ($app) {
        //     return new PostAuth();
        // });

        // $this->app->singleton('Tipax.auth', function ($app) {
        //     return new TipaxAuth();
        // });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //$this->registerPolicies();
        //Passport::routes();
    }
}
