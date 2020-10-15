<?php

namespace App\Providers;



use App\Totalwood\src\Laga\Laga;
use App\Totalwood\src\Nagel\Nagel;
use App\Totalwood\src\Pilmat\Pilmat;
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
        $this->app->bind('Nagel', Nagel::class);
        $this->app->bind('Pilmat', Pilmat::class);
        $this->app->bind('Laga', Laga::class);

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
