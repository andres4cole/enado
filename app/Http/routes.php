<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/



Route::get('/', 'all@index');

Route::get('contact', 'contact@index');
Route::post('contact/e', 'contact@store');

// all the pages here
Route::get('about', 'all@about');
Route::get('developer', 'all@developer');
Route::get('developer/{id}', 'all@showdeveloper');
Route::get('news', 'all@news');
Route::get('news/{id}', 'all@shownews');
Route::get('portfolio', 'all@portfolio');
Route::get('portfolio/{id}', 'all@showportfolio');
Route::get('services', 'all@services');
Route::get('p/{url}', 'all@pages');
Route::post('save/e', 'all@newsletter');

//testimoines
Route::get('testimonies', 'testimonies@index');
Route::get('testimonies/share', 'testimonies@create');
Route::post('testimonies/e', 'testimonies@store');

// proposal
Route::get('request', 'proposal@index');
Route::post('request/e', 'proposal@store');
Route::post('request/s', 'proposal@sidebarproposal');
Route::get('request/access', 'proposal@accesskey');
Route::post('request/pv', 'proposal@verify');
Route::get('request/v/{token}', 'proposal@show');
Route::delete('request/d/{id}', 'proposal@destroy');


Route::controllers([
     'auth' => 'Auth\AuthController',
     'password' => 'Auth\PasswordController',
     
]);

Route::group(['prefix' => 'admin', 'middleware' => 'admin', 'namespace' => 'admin'], function(){




     Route::get('about', 'about@index');
     Route::get('about/v/{id}', 'about@show');
     Route::get('about/create', 'about@create');
     Route::post('about/store', 'about@store');
     Route::get('about/{id}/edit', 'about@edit');
     Route::post('about/{id}/update', 'about@update');
     Route::Delete('about/{id}/delete', 'about@destroy');

        //contact
     Route::get('contact', 'contact@index');
     Route::get('contact/v/{id}', 'contact@show');
     Route::get('contact/{id}/reply', 'contact@reply');
     Route::post('contact/store', 'contact@store');
     Route::Delete('contact/{id}/delete', 'contact@destroy');



     //developer
     Route::get('developer', 'developer@index');
     Route::get('developer/v/{id}', 'developer@show');
     Route::get('developer/create', 'developer@create');
     Route::post('developer/store', 'developer@store');
     Route::get('developer/{id}/edit', 'developer@edit');
     Route::post('developer/{id}/update', 'developer@update');
     Route::Delete('developer/{id}/delete', 'developer@destroy');



     //home
     Route::get('/', 'home@index');
     Route::get('login', 'home@login');
     Route::post('check', 'home@checklogin');
     Route::get('account/{id}', 'home@myprofile');
     Route::get('account/edit/{id}', 'home@editprofile');
     Route::post('account/{id}/update', 'home@updateprofile');



     //media
     Route::get('media', 'media@index');
     Route::get('media/v/{id}', 'media@show');
     Route::get('media/create', 'media@create');
     Route::post('media/store', 'media@store');
     Route::get('media/{id}/edit', 'media@edit');
     Route::post('media/{id}/update', 'media@update');
     Route::Delete('media/{id}/delete', 'media@destroy');

  
 	//admin news 
 	 Route::get('news', 'news@index');
     Route::get('news/v/{id}', 'news@show');
     Route::get('news/create', 'news@create');
     Route::post('news/store', 'news@store');
     Route::get('news/{id}/edit', 'news@edit');
     Route::post('news/{id}/update', 'news@update');
     Route::Delete('news/{id}/delete', 'news@destroy');

     //pages
     Route::get('pages', 'pages@index');
     Route::get('pages/v/{id}', 'pages@show');
     Route::get('pages/create', 'pages@create');
     Route::post('pages/store', 'pages@store');
     Route::get('pages/{id}/edit', 'pages@edit');
     Route::post('pages/{id}/update', 'pages@update');
     Route::Delete('pages/{id}/delete', 'pages@destroy');

     //portfolio
     Route::get('portfolio', 'portfolio@index');
     Route::get('portfolio/v/{id}', 'portfolio@show');
     Route::get('portfolio/create', 'portfolio@create');
     Route::post('portfolio/store', 'portfolio@store');
     Route::get('portfolio/{id}/edit', 'portfolio@edit');
     Route::post('portfolio/{id}/update', 'portfolio@update');
     Route::Delete('portfolio/{id}/delete', 'portfolio@destroy');


          //admin proposal 
     Route::get('proposal', 'proposal@index');
     Route::get('proposal/v/{id}', 'proposal@show');
     Route::get('proposal/create', 'proposal@create');
     Route::post('proposal/store', 'proposal@store');
     Route::get('proposal/{id}/edit', 'proposal@edit');
     Route::post('proposal/{id}/update', 'proposal@update');
     Route::Delete('proposal/{id}/delete', 'proposal@destroy');




     //services
     Route::get('services', 'services@index');
     Route::get('services/v/{id}', 'services@show');
     Route::get('services/create', 'services@create');
     Route::post('services/store', 'services@store');
     Route::get('services/{id}/edit', 'services@edit');
     Route::post('services/{id}/update', 'services@update');
     Route::Delete('services/{id}/delete', 'services@destroy');


     //settingss
     Route::get('settings', 'settings@index');
     Route::get('settings/v/{id}', 'settings@show');
     Route::get('settings/create', 'settings@create');
     Route::post('settings/store', 'settings@store');
     Route::get('settings/{id}/edit', 'settings@edit');
     Route::post('settings/{id}/update', 'settings@update');
     Route::delete('settings/{id}/delete', 'settings@destroy');

	 //slider
     Route::get('sliders', 'sliders@index');
     Route::get('sliders/v/{id}', 'sliders@show');
     Route::get('sliders/create', 'sliders@create');
     Route::post('sliders/store', 'sliders@store');
     Route::get('sliders/{id}/edit', 'sliders@edit');
     Route::post('sliders/{id}/update', 'sliders@update');
     Route::Delete('sliders/{id}/delete', 'sliders@destroy');


     //support
     Route::get('support', 'support@index');
     Route::get('support/v/{id}', 'support@show');
     Route::get('support/create', 'support@create');
     Route::post('support/store', 'support@store');
     Route::get('support/{id}/edit', 'support@edit');
     Route::post('support/{id}/update', 'support@update');
     Route::Delete('support/{id}/delete', 'support@destroy');


     //testimonies
     Route::get('testimonies', 'testimonies@index');
     Route::get('testimonies/v/{id}', 'testimonies@show');
     Route::get('testimonies/create', 'testimonies@create');
     Route::post('testimonies/store', 'testimonies@store');
     Route::get('testimonies/{id}/edit', 'testimonies@edit');
     Route::post('testimonies/{id}/update', 'testimonies@update');
     Route::Delete('testimonies/{id}/delete', 'testimonies@destroy');


});
