<?php


class UserController
{

    protected $error;

    public function store()
    {
        if ( ! $this->validate()) {
            header('Location:/signup');
        } else {
            if (App::get('database')->storeUser('users', [
                'email'    => $_POST['email'],
                'password' => password_hash($_POST['password'], PASSWORD_BCRYPT)
            ])) {
                header('Location:/');
            } else {
                header('Location:signup');
            }
        }
    }

    public function login()
    {
        if (App::get('database')->checkLogin($_POST['email'], $_POST['password'])) {
            header('Location:/');
        } else {
            header('Location:login');
        }
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
            $this->error = "Please enter an email address";
            return false;
        } else if ( ! $_POST['password']) {
            $this->error = "Please enter a password";
            return false;
        } else if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
            $this->error = "Please enter a valid email address";
            return false;
        } else {
            return true;
        }
    }
}