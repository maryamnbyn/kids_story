<?php

namespace App\Providers;

use App\Http\Services\Response\ResponseJson;
use Illuminate\Support\ServiceProvider;

class ResponseServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind('ResponseJson',function (){
            return new ResponseJson;
        });
    }
}
