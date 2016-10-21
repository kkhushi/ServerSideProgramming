<?php
require_once('Config.php');

$conn=new mysqli("localhost","root","");
$query="create database hw3data;
$conn->query($query);

if($conn->connect_errno)
{
	print("Error creating database");
	exit;
}
else
{
	$conn->select_db(DATABASE);
	$query="create table genre(gid int not null auto_increment,genrename varchar(20),primary key(gid))";
	$conn->query($query);
	$query="create table story(identifier int not null,author varchar(25),title varchar(25),ratings int,views int,submissiondate date,primary key(identifier))";
	$conn->query($query);
	$query="create table storycontent(identifier int not null,content text,primary key(identifier))";
	$conn->query($query);
	$query="create table storygenre(identifier int not null,gid int not null,primary key(identifier,gid),foreign key(identifier) references story(identifier),foreign key(gid) references genre(gid))";
	$conn->query($query);
	$conn->close();
}
?>

