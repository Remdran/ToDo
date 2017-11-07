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

    public function storeToDB($table, $params)
    {
        $sql = sprintf('INSERT INTO %s (%s) VALUES (%s)', $table, implode(', ', array_keys($params)), ':' . implode(', :', array_keys($params)));

        $statement = $this->pdo->prepare($sql);

        $statement->execute($params);
    }
}