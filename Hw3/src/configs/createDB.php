<?php


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
	$query="create table genre(gid int not null auto_increment,genrename varchar(20),primary key(gid))";
	$conn->query($query);
	$query="create table story(identifier int not null,author varchar(25),title varchar(25),sum_of_ratings_so_far int,number_of_ratings_so_far int,views int,submissiondate datetime,primary key(identifier))";
	$conn->query($query);
	$query="create table storycontent(identifier int not null,content text,primary key(identifier),foreign key(identifier) references story(identifier) on delete cascade)";
	$conn->query($query);
	$query="create table storygenre(identifier int not null,gid int not null,primary key(identifier,gid),foreign key(identifier) references story(identifier) on delete cascade,foreign key(gid) references genre(gid) on delete cascade)";
	$conn->query($query);
	$conn->close();
}
?>

