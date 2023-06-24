<?php

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['middleware' => 'client.credentials'], function() use ($router){
    
    $router->group(['prefix' => 's1'], function($router) {
        $router->get('/books', 'BooksController@showBooks');
        $router->get('/books/{id}', 'BooksController@showBook');
        $router->delete('/books/{id}', 'BooksController@deleteBook');
        $router->post('/books', 'BooksController@createBook');
        $router->put('/books/{id}', 'BooksController@patchBook');
    });


    $router->group(['prefix' => 's2'], function($router) {
        $router->get('/authors', 'AuthorsController@showAuthors');
        $router->get('/authors/{id}', 'AuthorsController@showAuthor');
        $router->delete('/authors/{id}', 'AuthorsController@deleteAuthor');
        $router->post('/authors', 'AuthorsController@createAuthor');
        $router->put('/authors/{id}', 'AuthorsController@patchAuthor');
    });
});