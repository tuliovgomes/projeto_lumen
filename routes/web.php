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

    $router->group(['prefix' => 'contacts'], function () use ($router) {
        $router->get('allContacts','ContactsController@allContacts');
        $router->get('find','ContactsController@find');
        $router->get('allLoansWithContact','ContactsController@allLoansWithContact');
        $router->post('create','ContactsController@create');
        $router->post('update','ContactsController@update');
    });

    $router->group(['prefix' => 'personalCollection'], function () use ($router) {
        $router->get('allCollection','PersonalCollectionController@allCollection');
        $router->get('types','PersonalCollectionController@types');
        $router->get('find','PersonalCollectionController@find');
        $router->post('create','PersonalCollectionController@create');
        $router->post('update','PersonalCollectionController@update');
    });
});