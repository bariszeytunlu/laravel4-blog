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
                            'uses' => 'Dashboard\UsersController@signIn', 'before' => 'csrf'
                            ));


});

//  Auth Control

Route::group(array('before' => 'auth'), function()
{
    \Route::get('elfinder', 'Barryvdh\ElfinderBundle\ElfinderController@showIndex');
    \Route::any('elfinder/connector', 'Barryvdh\ElfinderBundle\ElfinderController@showConnector');
    \Route::get('elfinder/tinymce', 'Barryvdh\ElfinderBundle\ElfinderController@showTinyMCE4');
});

Route::group(array('prefix' => 'dashboard', 'before' => 'auth'), function(){



    Route::get('/logout', array('as' => 'logout', 'uses' => 'Dashboard\UsersController@logout'));
    Route::get('/home', array('as' => 'home', 'uses' => 'Dashboard\HomeController@index'));

    // posts
    Route::get('posts', array('as' => 'posts', 'uses' => 'Dashboard\PostsController@index'));
    Route::get('posts/create', array('as' => 'createToPost', 'uses' => 'Dashboard\PostsController@create'));
    Route::post('posts/create', array('as' => 'storeToPost', 'uses' => 'Dashboard\PostsController@store'));
    Route::get('posts/edit/{id}', array('as' => 'editToPost', 'uses' => 'Dashboard\PostsController@edit' ));
    Route::post('posts/edit/{id}', array('as' => 'uptadeToPost', 'uses' => 'Dashboard\PostsController@update'));

});


