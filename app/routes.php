<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
        
});

Route::group(array('prefix' => 'dashboard'), function()
{
    Route::get('/', array('as' => 'login', 'uses' => 'Dashboard\Userscontroller@index'));
    Route::post('/', array('as' => 'loginPost',
                            'uses' => 'Dashboard\UsersController@signIn'
                            ));


});

//  Auth Control

Route::group(array('prefix' => 'dashboard', 'before' => 'auth'), function(){

    Route::get('/logout', array('as' => 'logout', 'uses' => 'Dashboard\UsersController@logout'));
    Route::get('/home', array('as' => 'home', 'uses' => 'Dashboard\HomeController@index'));

});


