<?php

class PagesController
{

    public function index()
    {
        require 'views/home.php';
    }

    public function signup()
    {
        require 'views/signup.php';
    }

    public function login()
    {
        require 'views/login.php';
    }
}