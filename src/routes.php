<?php

$router->get('', 'TodoController@get');
$router->get('completed', 'TodoController@filterCompleted');
$router->get('active', 'TodoController@filterActive');
$router->post('todos', 'TodoController@add');
$router->patch('todos/{id}', 'TodoController@update');
$router->get('todos/{id}/delete', 'TodoController@delete');
$router->post('todos/toggle-all', 'TodoController@toggle');
$router->post('todos/clear-completed', 'TodoController@clear');
