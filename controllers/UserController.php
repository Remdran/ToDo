<?php


class UserController
{

    public function store()
    {
        App::get('database')->storeToDB('users', [
            'email'    => $_POST['email'],
            'password' => password_hash($_POST['password'], PASSWORD_BCRYPT)
        ]);

        $_SESSION['logged_in'] = '1';
        header('Location:/');
    }

    public function login()
    {
        App::get('database')->checkLogin($_POST['email'], $_POST['password']);
        $_SESSION['logged_in'] = '1';
        header('Location:/');
    }

    public function logout()
    {
        if ( ! isset($_SESSION['logged_in'])) {
            echo "No Sessions set";
            die();
        }

        session_unset($_SESSION['logged_in']);
        echo "Session unset ";
        var_dump($_SESSION);
    }
}