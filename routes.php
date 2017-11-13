<?php

$router->get('', 'PagesController@index');
$router->get('signup', 'PagesController@signup');
$router->get('login', 'PagesController@login');
$router->get('logout', 'UserController@logout');
$router->get('tasks', 'TaskController@index');

$router->post('signup', 'UserController@store');
$router->post('login', 'UserController@login');
$router->post('tasks/new', 'TaskController@store');
