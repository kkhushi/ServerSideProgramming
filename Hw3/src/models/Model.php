<?php
namespace cool_name_for_your_group\hw3\models;

class Model {
public $model;
public $connection;

public function __construct()
{
	$this->initiateConnection();
}

public function initiateConnection()
{
	$this->connection=new \mysqli("localhost","root","","hw3data");
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