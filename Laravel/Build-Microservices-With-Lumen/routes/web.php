<?php

// ....

$router->group(['prefix' => 'api/v1'], function () use ($router) {
    $router->get('/items', ['uses' => 'ProductController@index', 'as' => 'product.index']);
    $router->post('/items', ['uses' => 'ProductController@create', 'as' => 'product.create']);
    $router->get('/items/{id}', ['uses' => 'ProductController@show', 'as' => 'product.show']);
    $router->put('/items/{id}', ['uses' => 'ProductController@update', 'as' => 'product.update']);
    $router->delete('/items/{id}', ['uses' => 'ProductController@destroy', 'as' => 'product.destroy']);
});
