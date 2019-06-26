<?php

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

$router->get('/', function() use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => '/api/v1'], function() use($router) {
    $router->group(['prefix' => '/employers'], function() use($router) {
        $router->get('/', 'EmployersController@index');
        $router->get('/{id}/jobs', 'EmployersController@show');
    });

    $router->group(['prefix' => '/jobs'], function() use($router) {
        $router->get('/', 'JobsController@index');
        $router->post('/', 'JobsController@store');
    });
});
