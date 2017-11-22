<?php


class UserController
{

    protected $error;

    public function store()
    {

        if ( ! $this->validate()) {
            header('Location:/signup');
            die();
        }

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

    public function validate()
    {
        if ( ! $_POST['email']) {
            echo "<p class='alert alert-danger' id='loginAlert'>Please enter an email address</p>";
            return false;
        } else if ( ! $_POST['password']) {
            echo "<p class='alert alert-danger' id='loginAlert'>Please enter a password</p>";
            return false;
        } else if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
            echo "Please enter a valid email address";
            return false;
        }
    }
}