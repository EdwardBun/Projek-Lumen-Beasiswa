<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->post('/login', 'UserController@login');

$router->group(['middleware' => 'auth'], function () use ($router) {
    $router->group(['prefix' => 'beasiswas'], function () use ($router) {
        $router->get('/', 'BeasiswaController@index');
        $router->post('/', 'BeasiswaController@store');
        $router->patch('/{id}', 'BeasiswaController@update');
        $router->delete('/{id}', 'BeasiswaController@destroy');
    });
    
    $router->group(['prefix' => 'users'], function () use ($router) {
        $router->get('/', 'UserController@index');
        $router->post('/', 'UserController@store');
        $router->get('/me', 'UserController@profile');
        $router->patch('/{id}', 'UserController@update');
        $router->delete('/{id}', 'UserController@destroy');
    });

    $router->group(['prefix' => 'details'], function () use ($router) {
        $router->get('/', 'DetailController@index');
        $router->post('/', 'DetailController@store');
    });

    $router->group(['prefix' => 'times'], function () use ($router) {
        $router->post('/', 'TimeController@store');
    });
});

$router->get('/logout', 'UserController@logout');

