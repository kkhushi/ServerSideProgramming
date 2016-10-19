<?php
namespace cool_name_for_your_group\hw3\views;

session_start();
define(BASE_URL,"http://localhost/Hw3");

class Landingview
{
	public function __construct()
	{
		
	}

	public function render()
	{
		print("<!DOCTYPE html>
		<html>
		<head><title>Five Thousand Characters</title></head>
		<body>
		<h1>Five Thousand Characters</h1>
		<a href=".BASE_URL."/index.php?c=Controllerwrite&m=invokewriteview>Write Something!</a> <br />
		<p> Check out what people are writing...</p>
		<form method=\"post\" action=".BASE_URL."/index.php?c=controllerwithphrase&m=render>
		<input type=\"text\" placeholder=\"Phrase Filter\" name=\"phrases\" /> <br />
		<select name=\"genres\">
		<option selected=\"selected\" value=\"all\">All Genres</option>
		</select> <br />
		<input type=\"submit\" value=\"Go\" />
		</form>");


		if(isset($_REQUEST["phrases"]))
		{
			$_SESSION["phrases"]=$_REQUEST["phrases"];
			$_SESSION["genres"]=$_REQUEST["genres"];
		}
		
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




