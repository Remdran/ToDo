<?php


class UserController
{

    public function store()
    {
        App::get('database')->storeUser('users', [
            'email'    => $_POST['email'],
            'password' => password_hash($_POST['password'], PASSWORD_BCRYPT)
        ]);
        header('Location:/');
    }

    public function login()
    {
        App::get('database')->checkLogin($_POST['email'], $_POST['password']);
        header('Location:/');
    }

    public function logout()
    {
        if ( ! isset($_SESSION['id'])) {
            echo "No Sessions set";
            die();
        }

        session_unset($_SESSION['id']);
        header('Location:/');
    }
}