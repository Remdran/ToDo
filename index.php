<?php
require 'core/bootstrap.php';
session_start();

Router::load('routes.php')
    ->direct(Request::uri(), Request::method());