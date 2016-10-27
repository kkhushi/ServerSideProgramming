<?php
namespace thrill_seekers\hw3\configs;

use thrill_seekers\hw3\configs\Config;

require_once('Config.php');
$conn=new \mysqli(Config::DB_HOST,Config::DB_USER,Config::DB_PASSWORD);
$query="create database ".Config::DB_NAME;
$conn->query($query);

if($conn->connect_error)
{
	print("Error creating database");
	exit;
}
else
{
	$conn->select_db(Config::DB_NAME);
	$conn->query("drop table if exists genre,story,storycontent,storygenre");
	$handle = fopen("insert.sql", "r");
    	if ($handle) {
    		while (($line = fgets($handle)) !== false) {
    			$query = $line;
    			$conn->query($query); 
    			}
	fclose($handle);
	}
	else
	{
		print("insertsql file not found!");
	}
$conn->close();
	
}
