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
        if ($this->validate()) {
            App::get('database')->storeTask('tasks', [
                'userid' => $_SESSION['id'],
                'title'  => $_POST['taskTitle'],
                'body'   => $_POST['taskContent']
            ]);
        }

        header('Location:/tasks');
    }

    public function destroy()
    {
        $id = explode("=", $_SERVER['QUERY_STRING']);
        $id = $id[1];

        App::get('database')->deleteTask($id);

        header('Location:/tasks');
    }

    public function update()
    {
        $id = $_POST['taskId'];
        $title = $_POST['taskTitle'];
        $body = $_POST['taskBody'];

        App::get('database')->updateTask($title, $body, $id);

        header('Location:/tasks');
    }

    public function validate()
    {
        if ($_POST['title'] > 20) {
            die("title is too long, max chars 60");
        } else if ($_POST['taskBody'] > 40) {
            die("description is too long, max chars 40");
        } else {
            return true;
        }
    }
}