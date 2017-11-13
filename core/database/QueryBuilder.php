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
        $sql = 'SELECT * FROM users WHERE email=  :email';
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(':email', $email);
        $statement->execute();

        $user = $statement->fetchAll();

        if ($statement->rowCount() > 0) {
            if (password_verify($password, $user[0]['password'])) {
                $_SESSION['id'] = $user[0]['id'];
            } else {
                die("Wrong Password");
            }
        } else {
            die("Wrong email");
        }
    }

    public function storeUser($table, $params)
    {
        $sql = sprintf('INSERT INTO %s (%s) VALUES (%s)', $table, implode(', ', array_keys($params)), ':' . implode(', :', array_keys($params)));

        $statement = $this->pdo->prepare($sql);
        $statement->execute($params);
        $_SESSION['id'] = $this->pdo->lastInsertId();
    }

    public function storeTask($table, $params)
    {
        $sql = sprintf('INSERT INTO %s (%s) VALUES (%s)', $table, implode(', ', array_keys($params)), ':' . implode(', :', array_keys($params)));
        // var dump sql to check the string is correct

        $statement = $this->pdo->prepare($sql);
        $statement->execute($params);
    }
}