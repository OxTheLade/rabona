<?php

namespace App\Providers;


use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

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
        //
        Carbon::setLocale('da');

        Validator::extendImplicit('current_password',
            function ($attribute, $value, $parameters, $validator) {
                return Hash::check($value, auth()->user()->password);

            });

    }
}
