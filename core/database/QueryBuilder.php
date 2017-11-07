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

    public function storeToDB($userid, $title, $desc)
    {
        $statement = $this->pdo->prepare("INSERT INTO list (userid, title, description) VALUES (:userid, :title, :description)");
        $statement->bindParam(':userid', $userid);
        $statement->bindParam(':title', $title);
        $statement->bindParam(':description', $desc);

        $statement->execute();

    }
}