<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Validator::extend('uniqueName', function ($attribute, $value, $parameters, $validator) {
            $count = \DB::table('products')->where('first_name', $value)
                                        ->where('surname', $parameters[0])
                                        ->count();

            return $count === 0;
        }, 'The name has already been taken.');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // register the services that are only used for development
        if ($this->app->environment() == 'local') {
            $this->app->register('Laracasts\Generators\GeneratorsServiceProvider');
            $this->app->register('Backpack\Generators\GeneratorsServiceProvider');
        }
    }
}
