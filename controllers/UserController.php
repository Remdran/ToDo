<?php


class UserController
{

    public function store()
    {
        App::get('database')->storeToDB('users', [
            'email'    => $_POST['email'],
            'password' => password_hash($_POST['password'], PASSWORD_BCRYPT)
        ]);
        require 'views/signUp.php';
    }
}