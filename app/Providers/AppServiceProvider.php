<?php

namespace App\Providers;

use Validator;

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
            Validator::extend('greater_equal_than_field', function($attribute, $value, $parameters, $validator) {
              $min_field = $parameters[0];
              $data = $validator->getData();
              $min_value = $data[$min_field];
              return $value >= $min_value;
            });   

            Validator::replacer('greater_equal_than_field', function($message, $attribute, $rule, $parameters) {
              return str_replace(':field', $parameters[0], $message);
            });
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
