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

//user endpoints
$router->post('/auth/register', [
    'uses' => 'UserController@register',
    'as' => 'register'
]);

$router->post('/auth/login',[
    'uses' => 'UserController@login',
    'as'=> 'login'
]);

$router->get('/category/all',[
    'uses' => 'CategoryController@all',
    'as' => 'categories'
]);

$router->get('/category/{id}',[
    'uses' => 'CategoryController@get_category',
    'as' => 'get_category'
]);

//category endpoints
$router->post('/category/add',[
    'uses' => 'CategoryController@add',
    'as' => 'add_category'
]);

$router->delete('/category/delete/{id}',[
    'uses' => 'CategoryController@delete_category',
    'as' => 'delete_category'
]);

$router->put('/category/edit/{id}',[
    'uses' =>'CategoryController@update_category',
    'as' => 'update_category'
]);

//recipe endpoints
$router->post('/category/{id}/recipe',[
    'uses' => 'RecipeController@create_recipe',
    'as' => 'create_recipe'
]);

$router->get('/category/{id}/recipe',[
    'uses' => 'RecipeController@all_recipes',
    'as' => 'all_recipes'
]);

$router->get('/category/{id}/recipe/{recipe_id}',[
    'uses' => 'RecipeController@get_recipe',
    'as' => 'get_recipe'
]);

$router->delete('/category/id/recipe/{recipe_id}',[
    'uses' => 'RecipeController@delete_recipe',
    'as' => 'delete_recipe'
]);

$router->put('/category/id/recipe/{recipe_id}',[
    'uses' => 'RecipeController@update_recipe',
    'as' => 'delete_recipe'
]);