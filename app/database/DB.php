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

	public function getUserSingleData($data){
		// dd($data['email']);
		$sql = "SELECT * FROM `users` WHERE email=:email";
		$value = [
			":email" => $data['email'],
		];
		$fetchedSignInfo = $this->query($sql,$value);
		return $fetchedSignInfo->fetch(PDO::FETCH_OBJ);

	}
}
