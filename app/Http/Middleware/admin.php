<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
//use Illuminate\Contracts\Routing\Middleware;
use Illuminate\Contracts\Routing\ResponseFactory;
use Auth;

class admin 
// implements Middleware
{



    protected $auth; 
    protected $response;

   public  function __construct(Guard $auth, ResponseFactory $response) {
        $this->auth = $auth;
        $this->reponse = $response;

    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
           if($this->auth->check())
        {
            $admin = 0;
            if($this->auth->user()->is_admin == 1)
            {
                $admin =1;
            }

            if($this->auth->user()->is_admin == 0)
            {
                return redirect('/')->with('error_msg', ' you are not authorize to acess this page');
            }

            return $next($request);

        }
        return redirect('/auth/login');

    }
}
