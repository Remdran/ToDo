<?php

class QueryBuilder
{

    protected $pdo;

    /**
     * QueryBuilder constructor.
     * @param $pdo
     */
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function retriveAll($table, $intoClass)
    {
        $statement = $this->pdo->prepare("SELECT * FROM " . $table);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS, $intoClass);
    }

    public function checkLogin($email, $password)
    {
        $sql = 'SELECT * FROM users WHERE email= :email';
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(':email', $email);
        $statement->execute();

        $user = $statement->fetchAll();

        if ($statement->rowCount() > 0) {
            if (password_verify($password, $user[0]['password'])) {
                $_SESSION['id'] = $user[0]['id'];
                return true;
            } else {
                $_SESSION['message'] = "Wrong Password";
                return false;
            }
        } else {
            $_SESSION['message'] = "Wrong Email";
            return false;
        }
    }

    public function storeUser($table, $params)
    {
        if ( ! $this->checkEmailInUse($params['email'])) {
            $_SESSION['message'] = "Email already in use";
            return false;
        }

        $sql = sprintf('INSERT INTO %s (%s) VALUES (%s)', $table, implode(', ', array_keys($params)), ':' . implode(', :', array_keys($params)));

        $statement = $this->pdo->prepare($sql);
        $statement->execute($params);
        $_SESSION['id'] = $this->pdo->lastInsertId();
        return true;
    }

    public function checkEmailInUse($email)
    {
        $sql = 'SELECT * FROM users WHERE email= :email';
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(':email', $email);
        $statement->execute();

        if ($statement->rowCount() > 0) {
            return false;
        } else {
            return true;
        }
    }

    public function storeTask($table, $params)
    {
        $sql = sprintf('INSERT INTO %s (%s) VALUES (%s)', $table, implode(', ', array_keys($params)), ':' . implode(', :', array_keys($params)));

        $statement = $this->pdo->prepare($sql);
        $statement->execute($params);
    }

    public function retrieveAllTasks()
    {
        $statement = $this->pdo->prepare("SELECT * FROM tasks WHERE userid = '" . $_SESSION['id'] . "'");
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS);
    }

    public function deleteTask($id)
    {
        $sql = 'DELETE FROM tasks WHERE id= :id';
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->execute();
    }

    public function updateTask($title, $body, $id)
    {
        $sql = 'UPDATE tasks SET title= :title, body= :body WHERE id= :id';
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(':title', $title);
        $statement->bindParam(':body', $body);
        $statement->bindParam(':id', $id);

        $statement->execute();
    }
}