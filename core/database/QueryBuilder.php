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

        if ($statement->rowCount() > 0) {
            if (password_verify($password, $statement->fetchColumn(2))) {
                echo "Password Correct";
            } else {
                echo "Wrong Password";
            }
        } else {
            echo "Wrong email";
        }
    }

    public function storeToDB($table, $params)
    {
        $sql = sprintf('INSERT INTO %s (%s) VALUES (%s)', $table, implode(', ', array_keys($params)), ':' . implode(', :', array_keys($params)));

        $statement = $this->pdo->prepare($sql);

        $statement->execute($params);
    }
}