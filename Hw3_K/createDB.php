<?php
//require_once('Config.php');
$conn=new mysqli("localhost","root","");
$query="create database hw3data";
$conn->query($query);

if($conn->connect_errno)
{
	print("Error creating database");
	exit;
}
else
{
	$conn->select_db("hw3data");
    $conn->query("drop table if exists genre,story,storycontent,storygenre");
	$handle = fopen("insert.sql", "r");
    if ($handle) {
    while (($line = fgets($handle)) !== false) {
    	$query = $line;
    	$conn->query($query); 
    }
    fclose($handle);
    } else {
    	//File not found
    } 
}
?>

