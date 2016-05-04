<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\model\msettings;
use App\model\mcontacts;
use App\model\mportfolio;

class Admin extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $this->admin();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

      public function admin()
    {
         view()->composer('admin', function($view) {

            $sid = '2';            
            $site = msettings::findOrFail($sid);
            $ct = mcontacts::where('status', '=', 'active')->orderby('id','DESC')->take(3)->get();
            $view->with(compact('site', 'ct'));



        });
    }

}
