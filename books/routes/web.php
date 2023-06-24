<?php



$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/books', 'BookController@index');
$router->get('/books/{id}', 'BookController@showId');
$router->post('/books', 'BookController@add');
$router->put('/books/{id}', 'BookController@update');
$router->delete('/books/{id}', 'BookController@delete');

