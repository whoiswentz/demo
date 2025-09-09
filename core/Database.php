<?php

namespace Core;

use PDO;
use PDOException;
use PDOStatement;

class Database
{
	private PDO $connection;
	private PDOStatement $statement;

	public function __construct(array $config, string $username = 'root', string $password = '')
	{
		$dsn = 'mysql:' . http_build_query($config, '', ';');

		try {
			$this->connection = new PDO($dsn, $username, $password, [
				PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
			]);
		} catch (PDOException $exception) {
			die('Database connection failed: ' . $exception->getMessage());
		}
	}

	public function query(string $sql, array $params = []): Database
	{
		$this->statement = $this->connection->prepare($sql);
		$this->statement->execute($params);
		return $this;
	}

	public function fetch(): array|false
	{
		return $this->statement->fetch();
	}

	public function fetchOrFail(): array
	{
		$result = $this->fetch();

		// This is a anti-pattern, but for demo purpose it's okay
		// Never call an interface function from the database
		// Throw error or return null instead
		// Handle error in the controller
		if (!$result) {
			abort();
		}
		return $result;
	}

	public function fetchAll(): array
	{
		return $this->statement->fetchAll();
	}
}
