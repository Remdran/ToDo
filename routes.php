<?php

$router->get('', 'PagesController@index');
$router->post('register', 'UserController@store');
