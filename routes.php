<?php

$router->get('', 'PagesController@index');
$router->get('signup', 'PagesController@signup');
$router->get('login', 'PagesController@login');

$router->post('register', 'UserController@store');
$router->post('login', 'UserController@login');
