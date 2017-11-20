<?php


class TaskController
{

    public function index()
    {
        $tasks = App::get('database')->retrieveAllTasks();

        require 'views/personallist.php';
    }

    public function store()
    {
        App::get('database')->storeTask('tasks', [
            'userid' => $_SESSION['id'],
            'title'  => $_POST['taskTitle'],
            'body'   => $_POST['taskContent']
        ]);

        header('Location:/tasks');
    }
}