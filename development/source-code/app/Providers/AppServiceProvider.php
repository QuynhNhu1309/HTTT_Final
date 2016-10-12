<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../../node_modules/bootstrap/dist' => public_path('packages/bootstrap'),
            __DIR__ . '/../../node_modules/font-awesome' => public_path('packages/fontawesome'),
            __DIR__ . '/../../node_modules/angular' => public_path('packages/angular'),
            __DIR__ . '/../../node_modules/jquery/dist' => public_path('packages/jquery'),
            __DIR__ . '/../../node_modules/normalize.css' => public_path('packages/normalize'),
            __DIR__ . '/../../node_modules/bootstrap-social' => public_path('packages/bootstrap-social'),
            __DIR__ . '/../../node_modules/nprogress' => public_path('packages/nprogress'),
            __DIR__ . '/../../node_modules/animate.css' => public_path('packages/animate.css'),
            __DIR__ . '/../../node_modules/froala-editor' => public_path('packages/froala-editor'),
            __DIR__ . '/../../node_modules/angular-froala' => public_path('packages/angular-froala'),
        ], 'public');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
