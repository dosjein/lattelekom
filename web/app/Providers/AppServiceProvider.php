<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Response;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        Response::macro('attachment', function ($content) {

            $headers = [
                'Content-type'        => 'text/json',
                'Content-Disposition' => 'attachment; filename="download.json"',
            ];

            return Response::make($content, 200, $headers);

        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() == 'local') {
            $this->app->register('Appzcoder\CrudGenerator\CrudGeneratorServiceProvider');
        }
    }
}
