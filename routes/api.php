<?php

$api = app('Dingo\Api\Routing\Router');

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "API" middleware group. Now create something great!
|
*/

$api->version('api', [
    'namespace' => 'App\Http\Controllers',
    'middleware' => [
        'api.throttle'
    ],
    'limit' => app('config')['app']['rate_limit'], 'expires' => 1,
],function($api){
    $api->post('/blog/index', [
        'as' => 'api.blog.index',
        'uses' => 'Api\BlogController@index',
    ]);
    $api->get('/blog/detail', [
        'as' => 'api.blog.detail',
        'uses' => 'Api\BlogController@detail',
    ]);
});
