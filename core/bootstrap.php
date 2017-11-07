<?php

$config = require 'config.php';
require 'core/database/Connection.php';
require 'core/database/QueryBuilder.php';
require 'controllers/TaskController.php';

$pdo = Connection::make($config['database']);
$query = new QueryBuilder($pdo);
$task = new TaskController($query);

require 'controllers/index.php';