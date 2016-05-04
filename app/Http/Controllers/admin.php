<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;

class admin extends Controller
{
        public function __construct() {

       $this->middleware('auth');
       $this->middleware('admin');
   }
                   
       
}
