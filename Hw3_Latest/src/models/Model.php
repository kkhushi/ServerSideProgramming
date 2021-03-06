<?php
namespace thrill_seekers\hw3\models;

use thrill_seekers\hw3\configs\Config;

class Model {
public $model;
public $connection;

public function __construct()
{
	$this->initiateConnection();
}

public function initiateConnection()
{
	$this->connection=new \mysqli(Config::DB_HOST,Config::DB_USER,Config::DB_PASSWORD,Config::DB_NAME);
	if($this->connection->connect_error)
	{
		return false;
	}
	else return true;
}

public function closeConnection()
{
	$this->connection->close();
}
}
