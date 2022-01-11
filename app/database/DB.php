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

		$sql = "SELECT * FROM `{$tableName}` ;";
		$fetchedInfo = $this->query($sql);
		return $fetchedInfo->fetchAll(PDO::FETCH_OBJ);
	}

	public function insert($tableName, $data)
	{


		// $sql = "INSERT INTO `users` (`id`, `user_id`, `name`, `email`, `phone`, `country`, `password`) 
		// 		VALUES (NULL, 'fdgdsfgf', 'hasib', 'hasib@gmail.com', '01626974223', 'Bangladesh', '123')";

		$sql = "INSERT INTO {$tableName} ";
		$dataKeys = "";
		$dataValue = "";
		$trimDataKeys = '';
		$trimDataValues = '';
		$values = [];


		foreach ($data as $key => $value) {
			$dataKeys .= "`{$key}`,";
			$dataValue .= ":{$key},";
			$values[":{$key}"] = $value;
		}

		$trimDataKeys = rtrim($dataKeys, ',');
		$trimDataValues = rtrim($dataValue, ',');

		$finalSql = $sql . '(' . $trimDataKeys . ')' . ' VALUES ' . '(' .   $trimDataValues  . ')';

		return $this->query($finalSql, $values);
	}
}
