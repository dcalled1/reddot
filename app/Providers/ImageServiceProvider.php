<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\ImageStorage;
use App\Util\ImageLocalStorage;

class ImageServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ImageStorage::class, function(){
            //return new ImageLocalStorage();
            return new ImageS3Storage();
        });

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
