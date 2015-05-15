<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

$app->get('/', function() use ($app) {
    return $app->welcome();
});

$app->post('op_infos/{op_info_id}/comments', 'App\Http\Controllers\OpInfoController@comment');

$app->get('op_infos/{op_info_id}/comments', 'App\Http\Controllers\OpInfoController@comments');
// assignment book abbr ab
$app->post('ab/{ab_id}/comments', 'App\Http\Controllers\OpInfoController@abComment');
// create a user
$app->post('user', ['middleware' => 'validation', 'uses' => 'App\Http\Controllers\UserController@store']);
