<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use App\Http\Controllers\PodcastController;
use App\Models\Podcast;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//CRUD
//1.get all(GET) /books
//2.create a book(POST) /books
//3.read a single(GET) /books/{id}
//4.update a single(PUT/PATCH) /books/{id}
//5.delete a single(DELETE) /books/{id}

$router->get('/podcasts', 'PodcastController@index');
// $router->post('/createbook', 'BookController@create');
// $router->get('/readbook/{id}', 'BookController@read');
// $router->put('/updatebook/{id}', 'BookController@update');
// $router->delete('/deletebook/{id}', 'BookController@deletebook');


//to create a book
//1.create the database and migrations
//2.create a model to connect to the database
//3.create a controller to go get info from the database
//4.return that info

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


$router->post('/register', 'UsersController@register');