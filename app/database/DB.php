<?php

namespace App\Database;

use PDO;
use PDOException;

class DB
{
	private $dbConn;
	public function __construct()
	{
		$this->dbConn = $this->databaseConnection();
	}

	public function databaseConnection()
	{
		$dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME;

		try {
			return  new PDO($dsn, DB_USER, DB_PASSWORD);
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}

	public  function query($sql, $data = [])
	{
		$prepareSql = $this->dbConn->prepare($sql);
		$prepareSql->execute($data);

		return $prepareSql;
	}

	public function fetchAllData($tableName)
	{
		echo $tableName;
		$sql = "SELECT * FROM `{$tableName}` ;";
		$fetchedInfo = $this->query($sql);
		return $fetchedInfo->fetchAll(PDO::FETCH_OBJ);
	}
}
