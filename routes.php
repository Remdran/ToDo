<?php

$router->get('', 'PagesController@index');
$router->get('signup', 'PagesController@signup');
$router->get('login', 'PagesController@login');
$router->get('logout', 'UserController@logout');

$router->post('signup', 'UserController@store');
$router->post('login', 'UserController@login');
