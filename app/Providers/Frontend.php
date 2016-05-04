<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\model\msettings;
use App\model\mportfolio;
use App\model\mcountries;


class Frontend extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
         $this->frontend();
        $this->country();
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

   public function frontend(){

        view()->composer('app', function($view){

            
            $id = '1';

            $site = msettings::find($id);
            $portfolio = mportfolio::where('status', '=', 'active')->orderby('id', 'DESC')->take(4)->get();
            $view->with(compact('site', 'portfolio'));


        });

    }

        public function country(){

        view()->composer('include.proposal', function($view){         
            $country = mcountries::all();
            $view->with(compact('country'));
        });

       }



  }



