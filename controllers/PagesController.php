<?php

class PagesController
{

    public function index()
    {
        require 'views/home.php';
    }

    public function hi()
    {
        echo "Hello";
    }
}