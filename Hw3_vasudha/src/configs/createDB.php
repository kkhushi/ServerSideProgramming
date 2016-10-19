<?php
require_once('Config.php');

$conn=new mysqli(HOST,USER,PASSWORD);
$query="create database ".DATABASE;
$conn->query($query);

if($conn->connect_errno)
{
	print("Error creating database");
	exit;
}
else
{
	$conn->select_db(DATABASE);
	$query="create table genre(gid int auto increment,genrename varchar(20))";
	$conn->query($query);
	$query="create table story(identifier int primary key,author varchar(25),title varchar(25),ratings int,views int,submissiondate date)";
	$conn->query($query);
	$query="create table storycontent(identifier int,content text)";
	$conn->query($query);
	$query="create table storygenre(identifier int,gid int)";
	$conn->query($query);
	$conn->close();
}
?>

