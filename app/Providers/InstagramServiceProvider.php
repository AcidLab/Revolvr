<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Classes\InstagramAPI;

class InstagramServiceProvider extends ServiceProvider
{
    public function boot()
    {
        //
    }
    
    public function register()
    {
        $this->app->bind('InstagramAPI', function(){
            return new InstagramAPI();
        });
    }
}
