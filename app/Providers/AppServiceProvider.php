<?php

namespace App\Providers;

use App\Models\SchoolProfile;
use App\Models\SchoolYear;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

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
        if($this->app->environment('production')) {
            URL::forceScheme('https');
        }
        $aydb = SchoolYear::where('status', 1)->first();
        $sprofile = SchoolProfile::find(1);
        Config::set('activeAY', $aydb);
        View::share('activeAY', $aydb);
        View::share('sprofile', $sprofile);
        // if($this->app->environment('production')) {
        //     URL::forceScheme('https');
        // }
        // $aydb = SchoolYear::where('status', 1)->first();
        // Config::set('activeAY', $aydb);
        // View::share('activeAY', $aydb);
    }
}
