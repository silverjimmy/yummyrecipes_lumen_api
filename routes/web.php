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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->post('/auth/register', [
    'uses' => 'UserController@register',
    'as' => 'register'
]);

$router->post('/auth/login',[
    'uses' => 'UserController@login',
    'as'=> 'login'
]);

$router->get('/category',[
    'uses' => 'CategoryController@category',
    'as' => 'categories'
]);

$router->get('/category/{id}',[
    'uses' => 'CategoryController@category',
    'as' => 'category'
]);
$router->post('/category',[
    'uses' => 'CategoryController@category',
    'as' => 'add_category'
]);
$router->delete('/category/{id}',[
    'uses' => 'CategoryController@category',
    'as' => 'delete_category'
]);
$router->put('/category/{id}',[
    'uses' =>'CategoryController@category',
    'as' => 'update_category'
]);
