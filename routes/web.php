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


$router->group(['prefix' => 'api'], function () use ($router) {
    $router->get('authenticate','UsersController@authenticate');

    $router->group(['prefix' => 'Contacts'], function () use ($router) {
        $router->get('allContacts','PersonalCollectionController@allContacts');
    });

    $router->group(['prefix' => 'PersonalCollection'], function () use ($router) {
        $router->get('allCollection','PersonalCollectionController@allCollection');
    });
});