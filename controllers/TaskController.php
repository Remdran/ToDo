<?php


class TaskController
{

    public function index()
    {
        require 'views/personallist.php';
    }

    public function store()
    {
        App::get('database')->storeTask('tasks', [
            'userid' => session_id(),
            'title'  => $_POST['taskTitle'],
            'body'   => $_POST['taskContent']
        ]);


    }
}