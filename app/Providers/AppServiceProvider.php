<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
		Schema::defaultStringLength('191');
		\Carbon\Carbon::setLocale('pt_BR');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() !== 'production') {
			$this->app->singleton(\Faker\Generator::class, function () {
				return \Faker\Factory::create(env('FAKER_LANGUAGE'));
			});
		}
    }
}
