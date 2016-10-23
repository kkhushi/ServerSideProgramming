<?php
namespace cool_name_for_your_group\hw3\views;

define(BASE_URL,"http://localhost/Hw3");

class Landingview extends View
{
	public $singleselectgenre;

	public function __construct()
	{
		$this->singleselectgenre=new GenreSingleSelectHelper($this);
	}
	public function render($data)
	{
		print("<!DOCTYPE html>
		<html>
		<head><title>$data['title']</title></head>
		<body>
		<h1>$data['title']</h1>
		<a href=".BASE_URL."/index.php?c=WriteController&m=invokewrite>Write Something!</a> <br />
		<p> Check out what people are writing...</p>
		<form method=\"post\" action=".BASE_URL."/index.php?c=controllerwithphrase&m=render>
		<input type=\"text\" placeholder=$data['placeholder'] name=\"phrases\" /> <br />");
		
		$this->singleselectgenre->render($data['genre']);
		print("<input type=\"submit\" value=\"Go\" name=\"gobutton\" /></form>");


		
		print("<h3>Highest Rated</h3>
		<ol>
		</ol>
		<h3>Most Viewed</h3>
		<ol>
		</ol>
		<h3>Newest</h3>
		<ol>
		</ol>
		</body>
		</html>");
	}
}




