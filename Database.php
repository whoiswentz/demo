<?php

class Database {
    private PDO $connection;

    public function __construct(
        array $config, 
        string $username = 'root', 
        string $password = ''
    ) {
        $dsn = 'mysql:' . http_build_query($config, '', ';');

        try {
            $this->connection = new PDO($dsn, $username, $password, [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
        } catch (PDOException $exception) {
            die("Database connection failed: " . $exception->getMessage());
        }        
    }

    public function query(string $sql, array $params = []): PDOStatement {
        try {
            $statement = $this->connection->prepare($sql);
            $statement->execute($params);
            return $statement;
        } catch (PDOException $exception) {
            die("Database query failed: " . $exception->getMessage());
        }
    }
}
