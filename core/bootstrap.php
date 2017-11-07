<?php

$config = require 'config.php';
require 'core/App.php';
require 'core/Router.php';
require 'core/Request.php';
require 'core/database/Connection.php';
require 'core/database/QueryBuilder.php';
require 'controllers/TaskController.php';
require 'controllers/UserController.php';
require 'controllers/PagesController.php';

App::bind('database', new QueryBuilder(
    Connection::make($config['database'])
));


